<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/langs', [UserController::class, 'get_langs']);
Route::get('/user/{id}', [UserController::class, 'get_user']);
Route::get('/posts', [postController::class, 'getPosts']);
Route::get('/posts/{id}', [postController::class, 'getPosts_by_user']);

Route::post('/makepost', [postController::class, 'makePost']);


Route::get('/restest', [postController::class, 'resourcetest']);
