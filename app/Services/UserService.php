<?php

namespace App\Services;

use App\Traits\UserToken;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Read\UserReadRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Repositories\Write\UserWriteRepository;

class UserService
{
    use UserToken;
    public function getUser(UserReadRepository $repository): Authenticatable
    {
        return $repository->getUser();
    }

    public function login($data, UserReadRepository $repository): array
    {
        if (Auth::attempt($data)) {
            $user = $this->getUser($repository);

            return $this->getToken($data['email'], $data['password']);
        } else {
            return [
                'data' => ['message' => 'Unauthorized.'],
                'status_code' => 401
            ];
        }
    }
    public function createUser($data, UserWriteRepository $repository): array
    {
        $user = $repository->createUser($data);
        event(new UserRegistered($user));

        return $this->getToken($data['email'], $data['password']);
    }

    public function logout(UserWriteRepository $repository): array
    {
        if ($repository->deleteUserTokens()){
            return [
                'data' => ['message' => 'Logged out successfully.'],
                'status_code' => 200
            ];
        } else {
            return [
                'data' => ['message' => 'Failed to logout.'],
                'status_code' => 500
            ];
        }
    }

    public function refreshUserToken($data): array
    {
        return $this->refreshToken($data['refresh_token']);
    }
}
