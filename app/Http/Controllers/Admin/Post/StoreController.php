<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tagsId = $data['tag_id'];
        unset($data['tag_id']);



        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

        $post = Post::query()->firstOrCreate($data);
        $post->tags()->attach($tagsId);
        return redirect()->route('admin.post.index');

    }
}
