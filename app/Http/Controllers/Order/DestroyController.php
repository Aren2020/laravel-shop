<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DestroyController extends Controller
{
    public function __invoke($id, OrderService $service): RedirectResponse
    {
        $status = $service->deleteOrder($id);

        return redirect(route('order.index'));
    }
}
