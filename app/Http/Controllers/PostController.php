<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index() {
        // go to the database
        // take data
        // call view and sent data

        $posts =  PostService::getAllPosts();
        return view("adminDashboard/all_posts", ["all_posts" => $posts]);
    }
}
