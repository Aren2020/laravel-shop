<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repositories\Read\UserReadRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserService $service, UserReadRepository $repository): JsonResponse
    {
        $data = $request->validated();

        $responseData = $service->login($data, $repository);

        return response()->json($responseData['data'], $responseData['status_code']);
    }
}
