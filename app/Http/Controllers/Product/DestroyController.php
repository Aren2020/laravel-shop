<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\Write\ProductWriteRepository;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke($slug, ProductService $service, ProductWriteRepository $repository): RedirectResponse
    {
        $service->deleteProduct($slug, $repository);

        return redirect()->route('product.index');
    }
}
