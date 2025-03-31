<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UpdateController extends Controller
{
    public function __invoke($id, UpdateRequest $request, CategoryService $service): CategoryResource
    {
        $data = $request->validated();

        $category = $service->updateCategory($id, $data);

        return CategoryResource::make($category);
    }
}
