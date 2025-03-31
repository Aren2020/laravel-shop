<?php

namespace App\Repositories\Write;

interface ProductWriteRepositoryInterface
{
    public function createProduct($data);
    public function updateProduct($product, $data);
    public function deleteProduct($slug);
}
