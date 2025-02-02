<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->paginate(3);

        $randomPosts = Post::get()->random(4);
        $likedPost = Post::query()->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);


        return view('post.index', compact('posts', 'randomPosts', 'likedPost'));
    }
}
