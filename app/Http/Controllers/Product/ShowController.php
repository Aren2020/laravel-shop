<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Repositories\Read\ProductReadRepository;
use App\Services\ProductService;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke($slug, ProductReadRepository $repository, ProductService $service): ProductResource
    {
        $product = $service->getProduct($slug, $repository);

        return ProductResource::make($product);
    }
}
