<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\TagController;
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

// TAGS
Route::get("tags", [TagController::class, "index"]);
Route::get("tags/post", [TagController::class, "show"]);

// CATEGORIES
Route::get("categories", [CategoryController::class, "index"]);

// POST
Route::get('/post/{postId}/category', [PostController::class, 'getPostCategory']);
Route::get('/post/{postId}/tags', [PostController::class, 'getPostTags']);
Route::post("post/add", [PostController::class, 'store']);
Route::post("post/edit", [PostController::class, 'update']);
