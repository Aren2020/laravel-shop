<?php

namespace App\Repositories\Write;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\Read\OrderReadRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderWriteRepository implements OrderWriteRepositoryInterface
{
    protected Order $model;
    public OrderReadRepository $readRepository;

    public function __construct(Order $order)
    {
        $this->model = $order;
        $this->readRepository = new OrderReadRepository();
    }

    public function deleteOrder($id): bool
    {
        $product = $this->readRepository->getOrderById($id);
        $product->delete();
        return true;
    }

    public function createOrder($user, Product $product, int $quantity): Order|array
    {
        $total_money = $quantity * $product->price;

        if ($total_money > $user->wallet){
            return ['message' => 'Not enough money', 'status_code' => 500];
        }

        try {
            DB::beginTransaction();

            $user->wallet -= $total_money;
            $user->save();

            $owner = $product->user;
            $owner->wallet += $total_money;
            $owner->save();


            $order = Order::query()->create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);

            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                'message' => 'Cannot buy the product',
                'exception' => $exception->getMessage(),
                'status_code' => 500
            ];
        }
    }
}
