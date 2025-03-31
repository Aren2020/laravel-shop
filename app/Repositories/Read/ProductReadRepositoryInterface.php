<?php

namespace App\Repositories\Read;

interface ProductReadRepositoryInterface
{
    public function getProducts($filter);
    public function getProductBySlug($slug);
    public function getProductById($id);
}
