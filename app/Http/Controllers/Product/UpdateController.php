<?php

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Repositories\Write\ProductWriteRepository;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $slug, ProductService $service, ProductWriteRepository $repository): RedirectResponse
    {
        $data = $request->validated();

        $product = $service->updateProduct($request, $slug, $data, $repository);

        return redirect(route('product.show', $product->slug));
    }
}
