<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = Product::query()->findMany([5, 10, 15, 20], ['id', 'code', 'name']);

        // $product = Product::query()->find([5, 10, 15, 20], ['id', 'code', 'name']);

        // $product = Product::query()->findOr([5, 10, 15, 20], ['id', 'code', 'name'], fn() => abort(403));

        // $product = Product::query()->findOr([5, 10, 15, 20], ['id', 'code', 'name'], function(){
        // abort(403);
        // });

        // $product = Product::query()->findOrFail([5, 10, 15, 20], ['id', 'code', 'name']);

        // $product = Product::query()->whereIn('id', [1, 2, 3])->get();

        $product = Product::query()->where('id', 1)->first();

        return view('home', compact('product'));
    }
}
