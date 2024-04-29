<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/posts', function () {
    return view("adminDashboard/all_posts");
});
Route::get('/admin/add-post', function () {
    return view("adminDashboard/add_post");
});
// Categories
Route::get('/admin/categories', function () {
    return view("adminDashboard/all_categories");
});
Route::get('/admin/add-category', function () {
    return view("adminDashboard/add_category");
});
// TAGS
Route::get('/admin/tags', function () {
    return view("adminDashboard/all_tags");
});
Route::get('/admin/add-tag', function () {
    return view("adminDashboard/add_tag");
});
