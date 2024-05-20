<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->getSidebarData();  
        return view("pages.blog.blog", [
            "posts"=>$data["posts"], 
            "categories"=>$data["categories"], 
            "tags"=>$data["tags"], 
            "popular_posts"=>$data["popular_posts"]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $post->total_access = $post->total_access + 1;
        $post->save();

        $data = $this->getSidebarData();
        return view("pages.post.post", [
            "post"=>$post, 
            "posts"=>$data["posts"], 
            "categories"=>$data["categories"], 
            "tags"=>$data["tags"], 
            "popular_posts"=>$data["popular_posts"]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getSidebarData():array
    {

        $popular_posts = Post::where("active", 1)->orderBy("total_access", "desc")->limit(3)->get();
        $all_posts = Post::with(['user:id,username', 'tags:slug,tag_name', "category:name_category,id"])->where("active", 1)->get();
        $all_categories = Category::where("active", "1")->get();
        $all_tags = Tag::where("active", 1)->get();
        return [
            "posts" => $all_posts, 
            "categories"=>$all_categories, 
            "tags"=>$all_tags, 
            "popular_posts" => $popular_posts
        ];
    }
}
