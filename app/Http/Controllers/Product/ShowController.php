<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.show', ['product' => $product]);
    }
}
