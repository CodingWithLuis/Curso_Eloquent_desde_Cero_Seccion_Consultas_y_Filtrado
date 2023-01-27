<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        // $posts = Post::with('user', 'category')->get();

        $categories = Category::all();

        $users = User::all();

        //Ejemplo 1 con IF
        // $query = Post::query()->with('user', 'category');
        //
        // if (!empty($request->category_id)) {
        //     $query = $query->where('category_id', $request->category_id);
        // }
        //
        // if (!empty($request->user_id)) {
        //     $query = $query->where('user_id', $request->user_id);
        // }
        //
        // if (!empty($request->is_published)) {
        //     $query = $query->where('is_published', $request->is_published);
        // }
        //
        // $posts = $query->get();
        //

        //Ejemplo 2 con when

        // $posts = Post::query()->with('user', 'category')
        //     ->when($request->category_id, function ($query) {
        //         $query->where('category_id', request('category_id'));
        //     })
        //     ->when($request->user_id, function ($query) {
        //         $query->where('user_id', request('user_id'));
        //     })
        //     ->get();
        //

        //Ejemplo 3 con IF
        // $query = Post::query()->with('user', 'category');
        //
        // if (!empty($request->category_id)) {
        //     $query = $query->where('category_id', $request->category_id);
        // } else {
        //     $query->orderBy('user_id', 'DESC');
        // }
        //
        // $posts = $query->get();
        //

        // Ejemplo 4 con when
        //
        $category = $request->category_id;

        $posts = Post::query()->with('user', 'category')
            ->when($request->category_id, function ($query) {
                $query->where('category_id', request('category_id'));
            }, function ($query) {
                $query->orderBy('user_id', 'ASC');
            })
            ->get();

        return view('posts.index', compact('posts', 'categories', 'users'));
    }
}
