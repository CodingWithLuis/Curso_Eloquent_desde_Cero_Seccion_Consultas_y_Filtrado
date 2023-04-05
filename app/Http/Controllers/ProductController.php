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
        // $products = Product::query()
        //     ->filter()
        //     ->cursorPaginate(10)
        //     ->withQueryString();

        $products = Product::query()
            ->filter()
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products'));
    }

    public function aggregates(): View
    {
        $total_products = Product::query()->count();

        $max_price_product = Product::query()->max('price');

        $min_price_product = Product::query()->min('price');

        $avg_price_product = Product::query()->avg('price');

        $sum_price_product = Product::query()->sum('price');

        $total_products2 = Product::query()
            ->groupBy('name')
            ->selectRaw('count(*) AS total_productos, name')
            ->pluck('total_productos', 'name');

        return view('products.aggregates', compact(
            'total_products',
            'max_price_product',
            'min_price_product',
            'avg_price_product',
            'sum_price_product',
            'total_products2'
        ));
    }

    public function having(): View
    {
        $products = Product::query()
            ->select('products.name', 'products.price')
            ->groupBy('products.name', 'products.price')
            ->having('price', '>', 500)
            ->orderBy('products.name', 'ASC')
            ->get();

        return view('products.having', compact('products'));
    }

    public function clone()
    {
        //Ejemplo 1
        // $product = Product::find(1);
        //
        // $new_product = $product->replicate();
        //
        // $new_product->name = 'Producto 2';
        //
        // $new_product->save();
        //
        // return $new_product;

        //Ejemplo 2
        $product = Product::query();

        // 2. filter by date
        $product->whereDate('created_at', today());

        // 3. verified and not verified users
        $products_active = $product->clone()->where('is_active', true)->get();
        $products_inactive = $product->clone()->where('is_active', false)->get();

        return $products_inactive;
    }
}
