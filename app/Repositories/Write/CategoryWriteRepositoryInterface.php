<?php

namespace App\Repositories\Write;

use App\Models\Product;
use App\Models\User;

interface CategoryWriteRepositoryInterface
{
    public function deleteCategory($id);
    public function createCategory($data);
}
