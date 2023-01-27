<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Scopes\ActiveScope;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        // $products = Product::query()
        //     ->withoutGlobalScope(ActiveScope::class)
        //     ->filter()
        //     ->get();

        //Video Paginacion
        $products = Product::query()
            ->filter()
            ->cursorPaginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }
}
