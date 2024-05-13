<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tag_name = $request->query("tag_name");
        if($tag_name !== null){
            $tag = Tag::where("tag_name", "like" ,"%$tag_name%")->get();
            if($tag){
                return $tag->toArray();
            }
            else{
                return ['error' => 'Tag not found'];
            }
        }
        else return Tag::all()->toArray();
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
    public function show(string $id)
    {
        try {
            
            $post = Post::where("id_post", $id)->first();
            dd($post);


        } catch (\Throwable $th) {
            
        }
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
}
