<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->when(request('search'), function ($query) {
                $query->where('code', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('name', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('price', 'LIKE', '%' . request('search') . '%');
            })->get();

        return view('products.index', compact('products'));
    }
}
