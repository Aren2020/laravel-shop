<?php

namespace App\Services;

use App\Http\Filters\ProductFilter;
use App\Models\Product;
use App\Repositories\Write\ProductWriteRepository;
use App\Repositories\Read\ProductReadRepository;
use App\Traits\UploadImage;

class ProductService
{
    use UploadImage;
    public function getProducts($data, ProductReadRepository $repository){
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        return $repository->getProducts($filter);
    }

    public function createProduct($request, $data, ProductWriteRepository $repository): Product
    {
        $data['image'] = $this->upload($request, 'image', 'products');

        return $repository->createProduct($data);
    }

    public function getProduct($slug, ProductReadRepository $repository): Product
    {
        return $repository->getProductBySlug($slug);
    }

    public function updateProduct($request, $slug, $data, ProductWriteRepository $repository): Product
    {

        $product = $repository->readRepository->getProductBySlug($slug);

        $data['image'] = $this->uploadAndDeleteOld($request, $product, 'image', 'products');

        return $repository->updateProduct($product, $data);
    }

    public function deleteProduct($slug, ProductWriteRepository $repository): bool
    {
        return $repository->deleteProduct($slug);
    }
}
