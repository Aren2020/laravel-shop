<?php

namespace App\Repositories\Write;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Repositories\Read\CategoryReadRepository;
use function Illuminate\Events\queueable;

class CategoryWriteRepository implements CategoryWriteRepositoryInterface
{
    protected Category $model;
    public CategoryReadRepository $readRepository;

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->readRepository = new CategoryReadRepository();
    }

    public function deleteCategory($id): bool
    {
        $product = $this->readRepository->getCategoryById($id);
        $product->delete();
        return true;
    }

    public function createCategory($data): Category
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function updateCategory($id, $data): Category
    {
        $category = $this->readRepository->getCategoryById($id);
        $category->update($data);
        return $category->fresh();
    }
}
