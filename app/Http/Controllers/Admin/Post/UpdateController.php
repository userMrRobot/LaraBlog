<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {

        $data = $request->validated();
        $tagsId = $data['tag_id'];
        unset($data['tag_id']);



        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

        $post->update($data);
        $post->tags()->sync($tagsId);



        return redirect()->route('admin.post.index');

    }
}
