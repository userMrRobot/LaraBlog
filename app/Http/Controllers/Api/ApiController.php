<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\Post\ApiLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function register(ApiRegisterRequest $request)
    {
        $data = $request->validated();

        $data = User::query()->create($data);
        return response()->json([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
        ], 201);
    }

    public function login(ApiLoginRequest $request)
    {
        dd(11121);
        if(Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                "message" => "Не верный пароль или логин",
            ], 401);
        }
        $user = Auth::user();
        dd($user);
    }

    public function logout()
    {
        return 33333;
    }
}
