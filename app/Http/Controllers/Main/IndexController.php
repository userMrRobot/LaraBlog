<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Mail\User\PasswordMail;
use App\Models\Post;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __invoke()
    {

       return redirect()->route('post.index');
    }
}
