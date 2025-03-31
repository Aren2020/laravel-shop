<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use App\Repositories\Read\CategoryReadRepository;
use App\Repositories\Read\UserReadRepository;
use App\Repositories\Write\CategoryWriteRepository;
use App\Repositories\Write\UserWriteRepository;
use App\Traits\UserToken;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CategoryService
{
    private readonly CategoryReadRepository $readRepository;
    private readonly CategoryWriteRepository $writeRepository;

    public function __construct()
    {
        $this->readRepository = new CategoryReadRepository();
        $this->writeRepository = new CategoryWriteRepository( new Category() );
    }

    public function getCategory($id): Category
    {
        return $this->readRepository->getCategoryById($id);
    }

    public function getCategories(): LengthAwarePaginator
    {
        return $this->readRepository->getCategories();
    }

    public function createCategory($data): Category
    {
        return $this->writeRepository->createCategory($data);
    }

    public function updateCategory($id, $data): Category
    {
        return $this->writeRepository->updateCategory($id, $data);
    }

    public function deleteCategory($id): bool
    {
        return $this->writeRepository->deleteCategory($id);
    }
}
