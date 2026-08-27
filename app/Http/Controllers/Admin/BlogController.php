<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content_ar' => 'required',
            'content_en' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');
        $data['slug'] = $this->generateUniqueSlug($request);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'تم إضافة المقال بنجاح');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content_ar' => 'required',
            'content_en' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');
        if ($request->filled('slug') || empty($blog->slug)) {
            $data['slug'] = $this->generateUniqueSlug($request, $blog->id);
        }
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'تم تعديل المقال بنجاح');
    }

    /**
     * Generate a unique, clean slug for blog
     */
    protected function generateUniqueSlug(Request $request, $excludeId = null)
    {
        if ($request->filled('slug')) {
            $baseSlug = Str::slug($request->slug, '-', null);
        } elseif ($request->filled('title_en')) {
            $baseSlug = Str::slug($request->title_en);
        } else {
            $baseSlug = Str::slug($request->title_ar, '-', null);
        }

        if (empty(trim($baseSlug))) {
            $baseSlug = 'post-' . time();
        }

        $slug = $baseSlug;
        $count = 2;
        while (Blog::where('slug', $slug)->when($excludeId, function($q) use ($excludeId) {
            return $q->where('id', '!=', $excludeId);
        })->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'تم حذف المقال بنجاح');
    }

    // Handle TinyMCE image upload
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('blogs/content', 'public');
            return response()->json(['location' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
