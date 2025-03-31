<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends Controller
{
    public function __invoke(CategoryService $service): ResourceCollection
    {
        $categories = $service->getCategories();

        return CategoryResource::collection($categories);
    }
}
