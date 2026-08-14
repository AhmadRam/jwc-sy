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
        $blog = Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        // SEO Meta
        $page_title = $blog->title;
        $meta_description = \Str::limit(strip_tags($blog->content), 150);
        
        // Fetch 3 random other blogs
        $randomBlogs = Blog::where('id', '!=', $blog->id)
            ->where('is_published', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
        
        return view('blog.show', compact('blog', 'page_title', 'meta_description', 'randomBlogs'));
    }
}
