<?php

namespace App\Repositories\Read;

use App\Models\Category;

interface CategoryReadRepositoryInterface
{
    public function getCategories();
    public function getCategoryById(int $id): Category;
}
