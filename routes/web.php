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

Route::get('/', function () {
    return view("pages/home/home");
});

// ADMIN DASHBOARD
Route::get('/admin', function () {
    return view("adminDashboard/admin");
});
// POSTS
Route::get('/admin/all-posts', function () {
    return view("adminDashboard/admin");
});
Route::get('/admin/add-posts', function () {
    return view("adminDashboard/admin");
});
// TAGS
Route::get('/admin/all-tags', function () {
    return view("adminDashboard/admin");
});
Route::get('/admin/add-tags', function () {
    return view("adminDashboard/admin");
});
// Categories
Route::get('/admin/all-categories', function () {
    return view("adminDashboard/admin");
});
Route::get('/admin/add-category', function () {
    return view("adminDashboard/admin");
});