<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RefreshTokenRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class RefreshController extends Controller
{
    public function __invoke(RefreshTokenRequest $request, UserService $service): JsonResponse
    {

        $data = $request->validated();

        $responseData = $service->refreshUserToken($data);

        return response()->json($responseData['data'], $responseData['status_code']);
    }
}
