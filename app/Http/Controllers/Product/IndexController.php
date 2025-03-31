<?php

namespace App\Http\Controllers\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterRequest;
use App\Repositories\Read\ProductReadRepository;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request, ProductService $service, ProductReadRepository $repository): ResourceCollection
    {
        $data = $request->validated();

        $products = $service->getProducts($data, $repository);

        return ProductResource::collection($products);
    }
}
