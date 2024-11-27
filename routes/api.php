<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/users',[UserController::class,'index']);
// Route::get('/users/{id}',[UserController::class,'show']);
// Route::get('/posts',[PostController::class,'index']);
// Route::get('/posts/{id}',[PostController::class,'show']);

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/profile', function(Request $r){
        return auth()->user();
    });
    Route::resource('posts',PostController::class)->only(['update','store','destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('posts',PostController::class)->only(['index']);