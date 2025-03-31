<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::all();

        return view('product.create', ['categories' => $categories]);
    }
}
