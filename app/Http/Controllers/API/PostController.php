<?php

namespace App\Http\Controllers\API;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use DateTime;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use stdClass;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Nemanjajjjjafjajea";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated_data = $request->validate([
                'body' => ['required', 'min:10', 'string'],
                'title' => ['required', 'min:3', 'string'],
                'slug' => ['required', 'min:3', 'string']
            ]);
            $category = Category::where("name_category", $request->input("category"))->first();
            if($category === null) throw new \Exception("There is not category with these name, add it and then apply it");
            
            $slug = SlugHelper::generateSlug($request->input("slug"));
            $is_exist_slug = Post::where("slug", $slug)->exists();
            if($is_exist_slug !== false) throw new Exception("You must type new slug there is already this slug");
            
            $all_tags = explode(",", $request->input("tags"));
            $tags = [];
            foreach($all_tags as $tag_name){
                $tag = Tag::where("tag_name", $tag_name)->first();
                if($tag === null) throw new Exception("There is not such a tag name, add it before you apply it on post");
                $tags[] = $tag;
            }

            $post = new Post();
            $post->title = $validated_data["title"];
            $post->body = $validated_data["body"];
            $post->id_author = 1; // hard coded, autorization is not done
            $post->id_category = $category->id;
            $post->date = now();
            $post->slug = $slug;
            $post->save();

            $post_id = $post->id;
            // inserting tags
            for ($i = 0; $i < count($tags); $i++) {
                $post_tag = new PostTag();
                $post_tag->post_id = $post_id;
                $post_tag->tag_id = $tags[$i]->id;
                $post_tag->save();
            }
            return ["success", $post];

        } catch (\Exception $e) {

            return [$e->getMessage()];
        }
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
}
