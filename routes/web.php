<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route for testing
Route::get("/db", function(){
    $post = DB::select("SELECT * FROM Tag");
    dd($post);
});

// Home page
Route::get('/', function () {
    return view("pages/home/home");
});

// Blog page
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/single-post/{post:slug}', [BlogController::class, 'show']);
Route::get('blog/search', [BlogController::class, 'search']);
Route::get('blog/category/{category:slug}', [BlogController::class, 'filterCategory']);
Route::get('blog/tag/{tag:slug}', [BlogController::class, 'filterTag']);

// Login page
Route::get('/admin/login', function () {
    return view("adminDashboard/login");
});

// ADMIN DASHBOARD
Route::get('/admin', function () {
    return view("adminDashboard/admin");
});

// POSTS
Route::get('/admin/posts', [PostController::class, 'index']);
Route::get('/admin/add-post', [PostController::class, 'create']);
Route::get('/admin/delete-post/{slug}', [PostController::class, 'destroy']);
Route::get('/admin/edit-post/{slug}', [PostController::class, 'edit']);

// Categories
Route::get('/admin/categories', [CategoryController::class, 'index']);

Route::view('/admin/add-category', "adminDashboard.category.add_category");
Route::get("/admin/delete-category/{name_category}", [CategoryController::class, "destroy"]);
Route::get("/admin/return-category/{slug}", [CategoryController::class, "returnCategory"]);
Route::get("/admin/edit-category/{category:slug}", [CategoryController::class, "edit"]);
Route::post('/admin/add-category', [CategoryController::class, 'store']);
Route::post('/admin/edit-category/', [CategoryController::class, 'update']);

// TAGS
Route::get('/admin/tags', [TagController::class, 'index']);
Route::get('/admin/edit-tag/{slug}', [TagController::class, 'edit']);
Route::view('/admin/add-tag/', "adminDashboard.tag.add_tag");
Route::post('/admin/edit-tag/', [TagController::class, 'update']);
Route::post('/admin/add-tag/', [TagController::class, 'store']);
Route::get('/admin/delete-tag/{slug}', [TagController::class, 'destroy']);
Route::get('/admin/return-tag/{tag_name}', [TagController::class, 'returnTag']);
