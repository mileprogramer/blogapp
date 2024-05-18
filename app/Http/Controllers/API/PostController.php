<?php

namespace App\Http\Controllers\API;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Services\TagService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            return response()->json(["success"=>"Successfully added new post"], 200);

        } catch (\Exception $e) {

            return response()->json([$e->getMessage()], 403);
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
    public function update(Request $request)
    {
        try {
            $post = Post::findOrFail($request->input('postId'));
            $category = Category::where("id", $post->id_category)->first()->toArray();
            $new_category = null;
            $rules = [];
            if($request->filled('title') && $request->input('title') !== $post->title){
                $rules['title'] = 'string|min:3';
            }

            if($request->filled('body') && $request->input('body') !== $post->body){
                $rules['body'] = 'string|min:10';
            }

            if($request->filled('slug') && $request->input('slug') !== $post->slug){
                $rules['slug'] = 'string|min:3|unique:posts,slug';
            }

            if($request->filled('category') && $request->input('category') !== $category["name_category"]){
                $rules['category'] = 'unique:category,name_category';
                $new_category = Category::where("name_category", $request->input("category"))->firstOrFail();
            }

            if(empty($request->input("tags"))){
                return response()->json([['error' => "You must add some tags"]], 403);
            }

            TagService::existingTags(explode(',', $request->input("tags")));
            $existing_tags_ids = PostTag::where("post_id", $post->id)->pluck("tag_id")->toArray();
            $new_tags_ids = Tag::whereIn("tag_name", explode(',', $request->input("tags")))->pluck("id")->toArray();
            $diff = TagService::compareTags($new_tags_ids, $existing_tags_ids);

            (empty($rules) && empty($diff))? throw new Exception("You did not change anything") : $request->validate($rules);
            (isset($rules["title"]))? $post->title = $request->input("title") : null;
            (isset($rules["body"]))? $post->body = $request->input("body") : null;
            (isset($rules["slug"]))? $post->slug = $request->input("slug") : null;
            (isset($rules["category"]))? $post->id_category = $new_category->id : null;
            
            $post->save();

            if(!empty($diff) && isset($diff)){
                $postId = $post->id;
                $insert_data = array_map(function ($tag_id) use ($postId) {
                    return ['tag_id' => $tag_id, 'post_id' => $postId, 'created_at'=>now()];
                }, $diff["tags_to_add"]);
    
                PostTag::insert($insert_data);
                PostTag::where('post_id', $postId)->whereIn('tag_id', $diff["tags_to_remove"])->delete();
            }

            return response()->json(["success"=>"Successfully edited post"]);

        } catch (ModelNotFoundException $exception) {

            return response()->json(['error' => 'Not found'], 404);

        } catch (\Exception $exception) {

            return response()->json(['error' => $exception->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPostCategory(string $id)
    {   
        try {
            $post = Post::where("id", $id)->where("active", 1)->first()->toArray();
            if($post === null){
                throw new Exception("There is not such a post");
            }
            $category = Category::where("id", $post["id_category"])->first();
            return ["name_category" => $category->name_category];

        } catch (\Exception $error) {
            return [$error->getMessage()];
        }
    }

    public function getPostTags(string $id)
    {   
        try {
            $tags = PostTag::with(['tag:id,tag_name'])->where("post_id", $id)->get();
            if($tags === null){
                throw new Exception("There is not such a post");
            }
            $tags= $tags->transform(function ($postTag) {
                return [
                    'id' => $postTag->tag->id,
                    'tag_name' => $postTag->tag->tag_name
                ];
            });
            return $tags;

        } catch (\Exception $error) {
            return [$error->getMessage()];
        }
    }

}
