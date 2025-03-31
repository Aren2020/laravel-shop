<?php

namespace App\Repositories\Read;


use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderReadRepository implements OrderReadRepositoryInterface
{
    public function getOrders(): LengthAwarePaginator
    {
        return Order::query()->paginate(5);
    }

    public function getOrderById(int $id): Order
    {
        return Order::query()->findOrFail($id);
    }
}
