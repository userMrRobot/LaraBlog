<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function __invoke()
    {

        $comments = Comment::query()->where('user_id', '=', Auth::id())->count();
        $likeds = PostUserLike::query()->where('user_id', '=', Auth::id())->count();

        return view('personal.main.index1', compact('comments', 'likeds'));

    }
}
