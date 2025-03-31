<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Write\UserWriteRepository;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserWriteRepository $repository, UserService $service): JsonResponse

    {
        $data = $request->validated();

        $responseData = $service->createUser($data, $repository);

        return response()->json($responseData['data'], $responseData['status_code']);
    }
}
