<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->getSidebarData();
        return view("pages.blog.blog", $data);
        
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
        $data["post"] = $post;
        $data["isFiltered"] = true;
        return view("pages.post.post", $data);
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

    public function search(Request $request)
    {
        // search by title and author

        $request->validate([
            "search-term"=>"string|min:3"
        ]);

        $search_term = $request->input("search-term");
        
        $posts = Post::where('title', 'LIKE', '%' . $search_term . '%')
            ->orWhereHas('user', function ($query) use ($search_term) {
                $query->where('username', 'LIKE', '%' . $search_term . '%');
            })
            ->with(['user:id,username', 'tags:slug,tag_name', 'category:id,name_category'])
            ->get();
    
        if($posts->isEmpty()){
            return redirect("/blog")->withErrors("There is not such a post with these title or the name of admin who write the post");
        }
        $data = $this->getSidebarData();
        $data["posts"] = $posts;
        $data["isSearched"] = true;
        return view("pages.blog.blog", $data);
    }

    public function filterCategory(Category $category)
    {
        $posts = Post::where("id_category", $category->id)->get();
        $data = $this->getSidebarData();
        $data["posts"] = $posts;
        $data["isFiltered"] = true;
        return view("pages.blog.blog", $data);
    }

    public function filterTag(Tag $tag)
    {
        $post_tag = PostTag::where("tag_id", $tag->id)->get();
        $post_ids = array_map(function($post_tag){
            return $post_tag["post_id"];
        }, $post_tag->toArray());
        $posts = Post::whereIn("id", $post_ids)->get();
        $data = $this->getSidebarData();
        $data["posts"] = $posts;
        $data["isFiltered"] = true;
        return view("pages.blog.blog", $data);
    }

    private function getSidebarData():array
    {

        $popular_posts = Post::where("active", 1)->orderBy("total_access", "desc")->limit(3)->get();
        $all_posts = Post::with(['user:id,username', 'tags:slug,tag_name', "category:name_category,id"])->where("active", 1)->get();
        $all_categories = Category::where("active", "1")->get();
        $all_tags = Tag::where("active", 1)->get();
        return [
            "posts" => $all_posts,
            "isFiltered" => false,
            "isSearched" => false,
            "categories"=>$all_categories, 
            "tags"=>$all_tags, 
            "popular_posts" => $popular_posts
        ];
    }
}
