<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Write\UserWriteRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(UserService $service, UserWriteRepository $repository): JsonResponse
    {
        $responseData = $service->logout($repository);

        return response()->json($responseData['data'], $responseData['status_code']);
    }
}
