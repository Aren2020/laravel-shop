<?php

namespace App\Repositories\Write;

use App\Models\User;
use App\Repositories\Read\UserReadRepository;
use mysql_xdevapi\Exception;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    protected User $model;
    private UserReadRepository $readRepository;

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->readRepository = new UserReadRepository();
    }

    public function createUser($data): User
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function deleteUserTokens(): bool
    {
        $this->readRepository->getUser()->tokens()->delete();
        return true;
    }
}
