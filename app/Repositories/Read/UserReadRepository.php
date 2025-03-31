<?php

namespace App\Repositories\Read;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function getUser(): Authenticatable
    {
        return Auth::user();
    }
}
