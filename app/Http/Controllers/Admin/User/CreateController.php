<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
//        dd(11111);
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }
}
