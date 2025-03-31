<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(OrderService $service): ResourceCollection
    {
        $orders = $service->getOrders();

        return OrderResource::collection($orders);
    }
}
