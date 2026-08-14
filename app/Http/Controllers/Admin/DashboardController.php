<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $blogsCount = Blog::count();
        
        return view('admin.dashboard', compact('usersCount', 'blogsCount'));
    }
}
