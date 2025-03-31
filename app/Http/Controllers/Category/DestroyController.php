<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DestroyController extends Controller
{
    public function __invoke($id, CategoryService $service): RedirectResponse
    {
        $status = $service->deleteCategory($id);

        return redirect(route('category.index'));
    }
}
