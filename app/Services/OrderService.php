<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\Read\OrderReadRepository;
use App\Repositories\Read\ProductReadRepository;
use App\Repositories\Read\UserReadRepository;
use App\Repositories\Write\OrderWriteRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    private readonly OrderReadRepository $readRepository;
    private readonly OrderWriteRepository $writeRepository;
    private readonly UserReadRepository $userReadRepository;
    private readonly ProductReadRepository $productReadRepository;

    public function __construct(){
        $this->readRepository = new OrderReadRepository();
        $this->userReadRepository = new UserReadRepository();
        $this->productReadRepository = new ProductReadRepository();
        $this->writeRepository = new OrderWriteRepository( new Order() );
    }

    public function getOrder($id): Order
    {
        return $this->readRepository->getOrderById($id);
    }

    public function getOrders(): LengthAwarePaginator
    {
        return $this->readRepository->getOrders();
    }

    public function deleteOrder($id): bool
    {
        return $this->writeRepository->deleteOrder($id);
    }

    public function createOrder($data): Order|array
    {
        $user = $this->userReadRepository->getUser();
        $product = $this->productReadRepository->getProductById($data['product_id']);

        return $this->writeRepository->createOrder($user, $product, $data['quantity']);
    }
}
