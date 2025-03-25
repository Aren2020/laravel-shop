<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(9);
//        dd($products);
//        $products = Product::paginate(9);
        return view('product.index', ['products' => $products]);
    }
}
