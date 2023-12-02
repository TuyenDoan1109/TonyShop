<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\ProductImage;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Product;
use App\Repositories\ProductImage\ProductImageRepositoryInterface;
use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{
    use StorageImageTrait;
    protected $productRepository;
    protected $categoryRepository;
    protected $brandRepository;
    protected $tagRepository;
    protected $productImageRepository;
    protected $options = '';
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        BrandRepositoryInterface $brandRepository,
        TagRepositoryInterface $tagRepository,
        ProductImageRepositoryInterface $productImageRepository
    ) {
        $this->middleware('auth:admin');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
        $this->tagRepository = $tagRepository;
        $this->productImageRepository = $productImageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 10;
        $products = $this->productRepository->getAllWithPaginate($limit, ['images', 'category', 'brand']);
//        dd($products);
//        \DB::enableQueryLog(); // Enable query log

//        $products = Product::with('rams', 'colors')->get();
//        return $products;

//        dd(\DB::getQueryLog()); // Show results of log

        return view('admin.products.index', compact('products'));
    }

    public function indexWithDeleted() {
        $products = $this->productRepository->getAllWithDeleted();
        return view('admin.categories.indexWithDeleted', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $options = $this->categoryRecursive($categories,0);
        return view('admin.products.create', compact('options', 'brands'));
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
    public function store(Request $request)   //CreateProductRequest
    {
        try {
            DB::beginTransaction();
            $dataCreateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'admin_id' => auth('admin')->id(),
                'content' => $request->content_product,
            ];
            $featureImageUpload = $this->UploadImageTrait($request,'feature_image', 'product');
            // Get feature image if it has
            if(!empty($featureImageUpload)) {
                $dataCreateProduct['feature_image_name'] = $featureImageUpload['fileName'];
                $dataCreateProduct['feature_image_path'] = $featureImageUpload['filePath'];
            }
//            dd($dataCreateProduct);
            $product = $this->productRepository->create($dataCreateProduct);

            // insert multiple images
            $detailImageUpload = $this->UploadMultipleImageTrait($request,'detail_image', 'product');
            if(!empty($detailImageUpload)) {
                $dataInsertProductImageTbl = [];
                foreach ($detailImageUpload as $key => $item) {
//                dd($product->id);
                    $dataInsertProductImageTbl[$key]['image_path'] = $item['filePath'];
                    $dataInsertProductImageTbl[$key]['image_name'] = $item['fileName'];
                    $dataInsertProductImageTbl[$key]['product_id'] = $product->id;
                    $dataInsertProductImageTbl[$key]['created_at'] = Carbon::now();
                    $dataInsertProductImageTbl[$key]['updated_at'] = Carbon::now();
                }
                $this->productImageRepository->createMany($dataInsertProductImageTbl);
            }

            // Insert Tags for product
            if(!empty($request->tag)){
                $arrTagId = [];
                foreach ($request->tag as $item2) {
                    $tag = $this->tagRepository->firstOrCreate(['name' => $item2]);
                    $arrTagId[] = $tag->id;
                }
//            dd($arrTagId);
                $product->tags()->attach($arrTagId);
            }
            DB::commit();
            return redirect(route('admin.products.index'))->with('alert-success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
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
        $product = $this->productRepository->getById($id, ['tags', 'images']);
        $categories = $this->categoryRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $options = $this->categoryRecursive($categories, 0, $product->category_id);
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $oldProduct = $this->productRepository->getById($id, ['images']);
            $dataUpdateProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'admin_id' => auth('admin')->id(),
                'content' => $request->content_product,
            ];
            $featureImageUpload = $this->UploadImageTrait($request,'feature_image', 'product');
            // Get feature image if it has
            $featureImagePathToDelete = '';
            if(!empty($featureImageUpload)) {
                $dataUpdateProduct['feature_image_name'] = $featureImageUpload['fileName'];
                $dataUpdateProduct['feature_image_path'] = $featureImageUpload['filePath'];

                $featureImagePathToDelete = $oldProduct->feature_image_path;
            }
//            dd($dataCreateProduct);

            $product = $this->productRepository->update($oldProduct, $dataUpdateProduct);

            // insert multiple images
            $detailImageUpload = $this->UploadMultipleImageTrait($request,'detail_image', 'product');
            $detailImagePathArrayToDelete = [];
            if(!empty($detailImageUpload)) {
                $dataInsertProductImageTbl = [];
                foreach ($detailImageUpload as $key => $item) {
//                dd($product->id);
                    $dataInsertProductImageTbl[$key]['image_path'] = $item['filePath'];
                    $dataInsertProductImageTbl[$key]['image_name'] = $item['fileName'];
                    $dataInsertProductImageTbl[$key]['product_id'] = $product->id;
                    $dataInsertProductImageTbl[$key]['created_at'] = Carbon::now();
                    $dataInsertProductImageTbl[$key]['updated_at'] = Carbon::now();
                }
                foreach ($oldProduct->images as $item) {
                    $detailImagePathArrayToDelete[] = $item->image_path;
                }
                $this->productImageRepository->deleteByProduct($oldProduct->id);
                $this->productImageRepository->createMany($dataInsertProductImageTbl);
            }

            // Insert Tags for product
            if(!empty($request->tag)){
                $arrTagId = [];
                foreach ($request->tag as $item2) {
                    $tag = $this->tagRepository->firstOrCreate(['name' => $item2]);
                    $arrTagId[] = $tag->id;
                }
//            dd($arrTagId);
                $product->tags()->sync($arrTagId);
            }
            DB::commit();

            // Delete Feature Image
            if(!empty($featureImagePathToDelete)) {
                $this->DeleteImageTrait($featureImagePathToDelete);
            }

            // Delete Detail Image
            if(!empty($detailImagePathArrayToDelete)) {
                $this->DeleteMultipaleImageTrait($detailImagePathArrayToDelete);
            }

            return redirect(route('admin.products.index'))->with('alert-success', 'Sửa thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return redirect()->back()->with('alert-error', 'Sửa thất bại');
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
        dd($id);







//        $product = $this->productRepository->delete($id);
//        if($product) {
//            return redirect(route('admin.products.index'))->with('alert-success', 'Delete thành công');
//        } else {
//            return redirect()->back()->with('alert-error', 'Delete thất bại');
//        }
    }

}
