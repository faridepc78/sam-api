<?php

namespace App\Http\Controllers\Api\V1\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Api\V1\Admin\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\V1\Admin\Category\CategoryPaginateResource;
use App\Http\Resources\Api\V1\Admin\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
       // $this->authorize('index', Category::class);

        $categorys = Category::query()
            ->latest()
            ->paginate($request->input('per_page', 10));

        return new CategoryPaginateResource($categorys);
    }

    public function store(CreateCategoryRequest $request)
    {
      //  $this->authorize('store', Category::class);

        $category = Category::query()
            ->create(filterNullData($request->validationData()));

        return $this->success_response(new CategoryResource($category),
            'category has been successfully created');
    }

    public function show(Category $category)
    {
       // $this->authorize('show', Category::class);

        return $this->success_response
        (CategoryResource::make($category),
            'show category information in admin panel');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //   $this->authorize('update', Category::class);

        $category->update(filterNullData($request->all()));



        return $this->success_response(new CategoryResource($category),
            'category has been successfully updated');
    }

    public function destroy(Category $category)
    {
      //  $this->authorize('destroy', Category::class);

        $category->delete();

        return $this->success_response
        (null, 'category has been successfully deleted');
    }
}
