<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostsController extends BaseController
{
    public function index()
    {

       $dataPost = Post::all();
       return response()->json(PostResource::collection($dataPost), 200);

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = Post::query()->create($data);
        return response()->json(PostResource::make($data), 201);
    }
    public function show(Post $post)
    {

        return response()->json(PostResource::make($post), 200);
    }
    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();

        $post->update($data);


        return response()->json(PostResource::make($post), 200);

    }
    public function delete(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Delete success'
        ], 204);
    }
}
