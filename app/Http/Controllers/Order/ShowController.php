<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class ShowController extends Controller
{
    public function __invoke($id, OrderService $service): OrderResource
    {
        $user = $service->getOrder($id);

        return OrderResource::make($user);
    }
}
