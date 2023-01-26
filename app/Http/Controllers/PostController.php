<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user', 'category')->get();

        $categories = Category::all();

        $users = User::all();

        return view('posts.index', compact('posts', 'categories', 'users'));
    }
}
