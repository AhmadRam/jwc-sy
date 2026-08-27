<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published', true)->latest()->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->orWhere('id', $slug)
            ->firstOrFail();

        if (!$blog->is_published && !auth()->check()) {
            abort(404);
        }
        
        // SEO Meta
        $page_title = $blog->title;
        $meta_description = \Str::limit(strip_tags($blog->content), 160);
        $og_image = $blog->image ? asset('storage/' . $blog->image) : asset('assets/img/og-image.jpg');
        $short_url = route('blog.short', $blog->id);

        // Approximate reading time
        $wordCount = count(preg_split('~[^\p{L}\p{N}\']+~u', strip_tags($blog->content), -1, PREG_SPLIT_NO_EMPTY));
        $reading_time = max(1, (int) ceil($wordCount / 180));
        
        // Fetch 3 random other blogs
        $randomBlogs = Blog::where('id', '!=', $blog->id)
            ->where('is_published', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
        
        return view('blog.show', compact('blog', 'page_title', 'meta_description', 'og_image', 'short_url', 'reading_time', 'randomBlogs'));
    }

    public function shortLink($id)
    {
        $blog = Blog::where('id', $id)
            ->orWhere('slug', $id)
            ->firstOrFail();

        if (!$blog->is_published && !auth()->check()) {
            abort(404);
        }

        $locale = request()->get('lang', session('locale', 'ar'));
        $routeName = $locale === 'en' ? 'blog.show_en' : 'blog.show';

        return redirect()->route($routeName, $blog->slug, 301);
    }
}
