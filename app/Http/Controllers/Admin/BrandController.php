<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Repositories\Brand\BrandRepositoryInterface;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;

class BrandController extends Controller
{
    use StorageImageTrait;
    protected $brandRepository;
    public function __construct(BrandRepositoryInterface $brandRepository) {
        $this->middleware('auth:admin');
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 10;
        $brands = $this->brandRepository->getAllWithPaginate($limit);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   // CreateBrandRequest
    {
        $dataCreateBrand = [
            'name' => $request->name
        ];

        // upload image
        $imageUpload = $this->UploadImageTrait($request,'image', 'brand');
        if(!empty($imageUpload)) {
            $dataCreateBrand['image_name'] = $imageUpload['fileName'];
            $dataCreateBrand['image_path'] = $imageUpload['filePath'];
        }

        $brand = $this->brandRepository->create($dataCreateBrand);

        if($brand) {
            return redirect(route('admin.brands.index'))->with('alert-success', 'Thêm mới thành công');
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
        $brand = $this->brandRepository->getById($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  // UpdateBrandRequest
    {
        $oldBrand = $this->brandRepository->getById($id);
        $dataUpdateBrand = [
            'name' => $request->name
        ];

        // upload image
        $imageUpload = $this->UploadImageTrait($request,'image', 'brand');
        if(!empty($imageUpload)) {
            $dataUpdateBrand['image_name'] = $imageUpload['fileName'];
            $dataUpdateBrand['image_path'] = $imageUpload['filePath'];

            // Delete Old Image
            $this->DeleteImageTrait($oldBrand->image_path);
        }

        $brand = $this->brandRepository->update($oldBrand, $dataUpdateBrand);

        if($brand) {
            return redirect(route('admin.brands.index'))->with('alert-success', 'Update thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Update thất bại');
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
        $brand = $this->brandRepository->getById($id);
        if($brand) {
            // Delete Image
            $this->DeleteImageTrait($brand->image_path);

            $result = $this->brandRepository->delete($brand);
            if($result) {
                return redirect(route('admin.brands.index'))->with('alert-success', 'Delete thành công');
            } else {
                return redirect()->back()->with('alert-error', 'Delete thất bại');
            }
        }
        return redirect()->back()->with('alert-error', 'Delete thất bại');
    }
}
