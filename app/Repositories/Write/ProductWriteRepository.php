<?php

namespace App\Repositories\Write;

use App\Models\Product;
use App\Repositories\Read\ProductReadRepository;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    protected Product $model;
    public ProductReadRepository $readRepository;

    public function __construct(Product $product)
    {
        $this->model = $product;
        $this->readRepository = new ProductReadRepository();
    }

    public function getProductBySlug($slug)
    {
        return Product::query()->where('slug', $slug)->firstOrFail();
    }

    public function createProduct($data): Product
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function updateProduct($product, $data): Product
    {
        $product->update($data);
        $product->fresh();

        return $product;
    }

    public function deleteProduct($slug): bool
    {
        $product = $this->readRepository->getProductBySlug($slug);
        $product->delete();
        return true;
    }
}
