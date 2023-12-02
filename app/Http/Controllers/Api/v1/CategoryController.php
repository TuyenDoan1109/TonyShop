<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
//        $categories = $this->categoryRepository->getAll();
//        return response()->ok(CategoryResource::collection($categories));

//        $categories = Category::all();
//        $categories = Category::with(['subcategories'])->get();
//        $categories = Category::with(['subcategories.products.product_reviews'])->has('subcategories')->get();
        $categories = Category::with(['subcategories.products.product_reviews'])->get();

//        $categories = Category::with(['subcategories.category'])->get();
//        return $categories;
        return response()->json([
            'data' => CategoryResource::collection($categories)
        ],200);
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if($category) {
            return response()->createdWithMessage(new CategoryResource($category), 'Created Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function show($id)
    {
//        dd('show');
//        $category = Category::find($id)->loadMissing(['subcategories'])->get();
//        $category = Category::where('id', $id)->first();
        $category = $this->categoryRepository->getById($id);
//        return new CategoryResource($category->loadMissing(['subcategories']));
        return response()->json([
            'data' => new CategoryResource($category->loadMissing(['subcategories.products']))
        ],200);
//        return $category;



//        $category = $this->categoryRepository->getById($id);
//        if($category) {
//            return response()->ok(new CategoryResource($category));
//        } else {
//            return response()->notFound('This post does not exist!');
//        }
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->update($id, $request->all());
        if($category) {
            return response()->okWithMessage(new CategoryResource($category), 'Updated Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->delete($id);
        if($category) {
            return response()->noContent();
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

}
