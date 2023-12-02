<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepository;
    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return response()->ok(PostResource::collection($posts));
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->postRepository->create($request->all());
        if($post) {
            return response()->createdWithMessage(new PostResource($post), 'Created Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function show($id)
    {
        $post = $this->postRepository->getById($id);
        if($post) {
            return response()->ok(new PostResource($post));
        } else {
            return response()->notFound('This post does not exist!');
        }
    }

    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->update($id, $request->all());
        if($post) {
            return response()->okWithMessage(new PostResource($post), 'Updated Successfully');
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

    public function destroy($id)
    {
        $post = $this->postRepository->delete($id);
        if($post) {
            return response()->noContent();
        } else {
            return response()->internalServerError('Something Wrong!');
        }
    }

}
