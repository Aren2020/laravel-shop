<?php

namespace App\Repositories\Write;

use App\Models\Product;
use App\Models\User;

interface OrderWriteRepositoryInterface
{
    public function deleteOrder($id);
    public function createOrder(User $user, Product $product, int $quantity);
}
