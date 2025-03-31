<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, CategoryService $service): CategoryResource
    {
        $data = $request->validated();

        $category = $service->createCategory($data);

        return CategoryResource::make($category);
    }
}
