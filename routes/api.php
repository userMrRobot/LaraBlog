<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
Route::group(['namespace' => 'App\Http\Controllers\Vue', 'prefix' => 'vue'], function () {
    Route::get('/{page}', 'IndexController')->name('vue.index')->where('page', '.*');

});
Route::group(['namespace' => '\App\Http\Controllers\Person', 'prefix' => 'person'], function () {
    Route::get('/', 'IndexController');
    Route::get('/{person}', 'ShowController');
    Route::post('/', 'StoreController');
    Route::patch('/{person}', 'UpdateController');
    Route::delete('/{person}', 'DeleteController');

});



Route::post('/registerApi', [\App\Http\Controllers\Api\ApiController::class, 'register'])
    ->middleware(['throttle:api']);

//Route::post('/loginApi', [\App\Http\Controllers\Api\ApiController::class, 'login']);

Route::post('/loginApi', function (Request $request) {
    if (!Auth::attempt($request->only(['email', 'password']))) {
        return response()->json([
            "message" => "Не верный пароль или логин",
        ], 401);
    }
    $user = Auth::user();
    $user->tokens()->delete();
    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'token' => $user->createToken('API Token')->plainTextToken,

    ], 200);
});

Route::post('/logoutApi', function (Request $request) {
    Auth::user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'Токен удален'
    ]);
});


Route::prefix('users')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::controller(\App\Http\Controllers\Api\UsersController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{user}', 'show');
        Route::patch('/{user}', 'update');
        Route::delete('/{user}', 'delete');
        Route::post('/logout', 'logout');
    })->withoutMiddleware(['VerifyCsrfToken']);

});

Route::prefix('posts')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::controller(\App\Http\Controllers\Api\PostsController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{post}', 'show');
        Route::patch('/{post}', 'update');
        Route::delete('/{post}', 'delete');
    })->withoutMiddleware(['VerifyCsrfToken']);

});


