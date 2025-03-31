<?php

namespace App\Repositories\Read;

use App\Models\Product;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    public function getProducts($filter)
    {
        return Product::filter($filter)->paginate(9)->withQueryString();
    }

    public function getProductBySlug($slug): Product
    {
        return Product::query()->where('slug', $slug)->firstOrFail();
    }

    public function getProductById($id): Product
    {
        return Product::query()->findOrFail($id);
    }
}
