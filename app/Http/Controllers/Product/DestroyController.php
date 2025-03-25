<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->delete();

        $categories = Category::all();
        $products = Product::all();
        return view('product.index', ['products' => $products,'categories' => $categories]);
    }
}
