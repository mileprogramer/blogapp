<?php

use App\Http\Controllers\AddPost;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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
Route::get('/blog', function () {
    return view("pages/blog/blog");
});

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
Route::get('/admin/add-post', [AddPost::class, 'create']);

// Categories
Route::get('/admin/categories', [CategoryController::class, 'index']);

Route::view('/admin/add-category', "adminDashboard.category.add_category");
Route::get("/admin/category/delete/{name_category}", [CategoryController::class, "destroy"]);
Route::get("/admin/category/return/{name_category}", [CategoryController::class, "retunCategory"]);
Route::get("/admin/category/edit/{name_category}", function($category) {
    return view("adminDashboard.category.edit_category", ["name_category"=>$category]);
});
Route::post('/admin/add-category', [CategoryController::class, 'store']);
Route::post('/admin/edit-category/', [CategoryController::class, 'edit']);

// TAGS
Route::get('/admin/tags', [TagController::class, 'index']);
Route::get('/admin/edit-tag/{slug}', [TagController::class, 'edit']);
Route::view('/admin/add-tag', "adminDashboard.tag.add_tag");
Route::post('/admin/edit-tag/', [TagController::class, 'edit']);
Route::post('/admin/add-tag/', [TagController::class, 'store']);
Route::get('/admin/delete-tag/{slug}', [TagController::class, 'destroy']);
