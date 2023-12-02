<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PostsExport;
use App\Exports\PostsMultiSheetExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use Maatwebsite\Excel\Excel;
//use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    protected $postRepository;
    public function __construct(PostRepositoryInterface $postRepository) {
        $this->middleware('auth:admin');
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->resetSessionSearch();

        if ($request->confirm_search == 1) {
            session(['key_search' => trim($request->key_search)]);
            return redirect(route('admin.posts.index'));
        }

        $limit = $request->input('limit') ?? config('app.paginate.per_page');
        $orderBy = $request->input('order_by') ?? 'id';
        $orderType = $request->input('order_type') ?? 'desc';
        $key_search = session()->has('key_search') ? session('key_search') : '';
        $order = [$orderBy, $orderType];

        $posts = $this->postRepository->getAllWithSearch($limit, $order, $key_search);

        return view('admin.posts.index', compact(
            'posts',
        ));
    }

    // Cách 1,2,3
//    public function excelExport() {
            //use Maatwebsite\Excel\Facades\Excel;
////        return Excel::download(new PostsExport, 'posts.xlsx');   // cách 1
////        return (new PostsExport)->download('users.xlsx');  // cách 2 (need to import use Exportable;)
//        return new PostsExport;   // cách 3 (class PostsExport implements FromCollection, Responsable)
//    }

//    public function excelExport(Excel $excel) {
//        // use Maatwebsite\Excel\Excel;
//        return $excel->download(new PostsExport, 'posts.xlsx');
//    }

    public function excelExport(Excel $excel) {
        // use Maatwebsite\Excel\Excel;
//        return $excel->download(new PostsMultiSheetExport(2023), 'posts.xlsx');
        return $excel->store(new PostsMultiSheetExport(2023), 'posts.xlsx');   // Store file
    }

    public function indexWithDeleted() {
        $posts = $this->postRepository->getAllWithDeleted();
        return view('admin.posts.indexWithDeleted', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = $this->postRepository->create($request->all());
        if($post) {
            return redirect(route('admin.posts.index'))->with('alert-success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Thêm mới thát bại');
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
        $post = $this->postRepository->getById($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->update($id, $request->all());
        if($post) {
            return redirect(route('admin.posts.index'))->with('alert-success', 'Update thành công');
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
        $post = $this->postRepository->delete($id);
        if($post) {
            return redirect(route('admin.posts.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

    public function forceDelete($id) {
        $post = $this->postRepository->deleteForever($id);
        if($post) {
            return redirect(route('admin.posts.index'))->with('alert-success', 'Forever Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Forever Delete thất bại');
        }
    }

    public function restore($id) {
        $post = $this->postRepository->restoreDeleted($id);
        if($post) {
            return redirect(route('admin.$post.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

}
