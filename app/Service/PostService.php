<?php

namespace App\Service;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tagsId = $data['tag_id'];
            unset($data['tag_id']);


            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::query()->firstOrCreate($data);
            $post->tags()->attach($tagsId);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
        return $post;

    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            $tagsId = $data['tag_id'];
            unset($data['tag_id']);

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
//            dd($data);
            $post->update($data);
            $post->tags()->sync($tagsId);
            DB::commit();
            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }

    }
}
