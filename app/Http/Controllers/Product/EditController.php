<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class EditController extends Controller
{
    public function __invoke($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }
}
