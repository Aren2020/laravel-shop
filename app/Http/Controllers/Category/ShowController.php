<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShowController extends Controller
{
    public function __invoke($id, CategoryService $service): CategoryResource
    {
        $category = $service->getCategory($id);

        return CategoryResource::make($category);
    }
}
