<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use function PHPUnit\Framework\isArray;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, OrderService $service): JsonResponse|OrderResource
    {
        $data = $request->validated();

        $order = $service->createOrder($data);

        if (isArray($order)) {
            return response()->json($order);
        }

        return OrderResource::make($order);
    }
}
