<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $options = '';
    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->middleware('auth:admin');
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 10;
        $categories = $this->categoryRepository->getAllWithPaginate($limit);
        return view('admin.categories.index', compact('categories'));
    }

    public function indexWithDeleted() {
        $categories = $this->categoryRepository->getAllWithDeleted();
        return view('admin.categories.indexWithDeleted', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $options = $this->categoryRecursive($categories,0);
        return view('admin.categories.create', compact('options'));
    }

    private function categoryRecursive($categories, $id, $parent_id = '', $text = '')
    {
        foreach ($categories as $item) {
            if($item['parent_id'] == $id) {
                if($parent_id == $item->id) {
                    $this->options = $this->options . "<option selected value=$item->id>$text" . $item['name'] . "</option>";
                } else {
                    $this->options = $this->options . "<option value=$item->id>$text" . $item['name'] . "</option>";
                }
                $this->categoryRecursive($categories, $item['id'], $parent_id, $text . '--');
            }
        }
        return $this->options;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if($category) {
            return redirect(route('admin.categories.index'))->with('alert-success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Thêm mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->getById($id);
        $categories = $this->categoryRepository->getAllExcept($id);
//        dd($categories);
        $options = $this->categoryRecursive($categories,0, $category->parent_id);
        return view('admin.categories.edit', compact('category', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $oldCategory = $this->categoryRepository->getById($id);
        $category = $this->categoryRepository->update($oldCategory, $request->all());
        if($category) {
            return redirect(route('admin.categories.index'))->with('alert-success', 'Update thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Update thát bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check this category have any depentd category



        $category = $this->categoryRepository->delete($id);
        if($category) {
            return redirect(route('admin.categories.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

    public function forceDelete($id) {
        $category = $this->categoryRepository->deleteForever($id);
        if($category) {
            return redirect(route('admin.categories.index'))->with('alert-success', 'Forever Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Forever Delete thất bại');
        }
    }

    public function restore($id) {
        $category = $this->categoryRepository->restoreDeleted($id);
        if($category) {
            return redirect(route('admin.categories.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

}
