<?php

namespace App\Http\Controllers\Product;

use App\Traits\UploadImage;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Repositories\Write\ProductWriteRepository;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    use UploadImage;

    public function __invoke(StoreRequest $request, ProductWriteRepository $repository, ProductService $service): RedirectResponse
    {
        $data = $request->validated();

        $product = $service->createProduct($request, $data, $repository);

        return redirect(route('product.show', $product->slug));
    }
}
