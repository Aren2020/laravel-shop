<?php

namespace App\Http\Controllers\Product;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Read\ProductReadRepository;
use App\Services\ProductService;

class EditController extends Controller
{
    public function __invoke($slug, ProductReadRepository $repository, ProductService $service): view
    {
        $product = $service->getProduct($slug, $repository);

        $categories = Category::all();

        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }
}
