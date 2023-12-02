<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    protected $postRepo;
    public function __construct(PostRepositoryInterface $postRepo) {
        $this->postRepo = $postRepo;
    }



    public function indexLaravelTest()
    {
        return view('TestLaravel.indexLaravelTest');
    }

    public function indexLaravelProject ()
    {
        return view('TestLaravel.indexLaravelProject');

    }

    public function test1()
    {
//        dd(4534534543888);
        Storage::disk('local')->put('example.txt', 'Contents');
    }

    public function test2()
    {
        $ids = [101,102,103];
        $result = $this->postRepo->deleteMany($ids);
        dd($result);
    }

}
