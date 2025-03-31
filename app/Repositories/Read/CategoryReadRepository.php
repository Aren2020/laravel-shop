<?php

namespace App\Repositories\Read;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryReadRepository implements CategoryReadRepositoryInterface
{
    public function getCategories(): LengthAwarePaginator
    {
        return Category::query()->paginate(5);
    }

    public function getCategoryById(int $id): Category
    {
        return Category::query()->findOrFail($id);
    }
}
