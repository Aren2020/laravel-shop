<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\Read\UserReadRepository;
use App\Services\UserService;

class UserController extends Controller
{
    public function __invoke(UserService $service, UserReadRepository $repository): UserResource
    {
        $user = $service->getUser($repository);

        return new UserResource($user);
    }
}

