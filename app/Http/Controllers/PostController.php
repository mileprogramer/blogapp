<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_posts = Post::with(['user:id,username', 'tags:id,tag_name', "category:name_category,id"])->where("active", 1)->get()->toArray();
        return view("adminDashboard.post.all_posts", ["all_posts" => $all_posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adminDashboard.post.add_post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // This is done in API/PostController.php
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        try {
            $post = Post::where("slug", $slug)->first();
            if($post === null){
                throw new Exception("There is not such a post");
            }
            return view("adminDashboard.post.edit_post", ["post"=>$post]);
        } catch (\Exception $error) {
            abort(404, $error->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            $post = Post::where("slug", $slug)->first();

            if($post === null) throw new Exception("There is not a post with that slug");
            $post->active = 0;
            $post->save();
            return redirect()->back()->with("success", "Successfully deleted post");
        } catch (\Exception $error) {
            return redirect()->back()->with("mistake", "Some mistake happend contact support");
        }

    }   
}
