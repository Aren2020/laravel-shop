<?php

namespace App\Repositories\Write;

interface UserWriteRepositoryInterface
{
    public function createUser($data);
    public function deleteUserTokens();
//    public function updateProduct($product, $data);
//    public function deleteProduct($slug);
}
