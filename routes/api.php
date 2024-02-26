<?php


use Illuminate\Http\Request;
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

// Routes pour UserController
Route::apiResource("users", App\Http\Controllers\UserController::class);

// Routes pour PostController
Route::apiResource("posts", App\Http\Controllers\PostController::class);

// Routes pour CommentController
Route::apiResource("comments", App\Http\Controllers\CommentController::class);
