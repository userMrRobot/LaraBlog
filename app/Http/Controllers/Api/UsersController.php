<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\User\StoreRequest;
use App\Http\Requests\Api\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UsersController extends BaseController
{
    public function index()
    {
       $dataUser = User::query()->limit(10)->get();
       return response()->json(UserResource::collection($dataUser), 200);
//        return UserResource::collection($dataUser);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data = User::query()->create($data);
        return response()->json(UserResource::make($data), 201);
    }
    public function show(User $user)
    {

        return response()->json(UserResource::make($user), 200);
    }
    public function update(User $user, UpdateRequest $request)
    {
        $data = $request->validated();

        $user->update($data);


        return response()->json(UserResource::make($user), 200);

    }
    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
