<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\SlugHelper;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::where('active', 1)->get()->toArray();
        return view("adminDashboard.tag.all_tags", ["all_tags" => $tags]);
    }

    public function store(Request $request)
    {
        try {
            $tag_name = $request->input('tag_name');
            $existing_tag = Tag::where('tag_name', $tag_name)->first();

            if($existing_tag){
                if ($existing_tag->active === 0) {
                    return view('adminDashboard.tag.add_tag', ['output' => ['return_tag' => 'There is already tag with this name but is unactive', "tag_name"=>$existing_tag->tag_name]]);
                }
                else throw new Exception('There is already an active tag with this name');
            }

            $request->validate([
                'tag_name' => ['required', 'string', 'min:3'],
            ]);
            $slug = SlugHelper::generateSlug($tag_name);

            Tag::create([
                "tag_name"=>$tag_name,
                "slug"=>$slug
            ]);

            return view('adminDashboard.tag.add_tag', [
                'output' => ['success' => 'You successfully added the new tag']
            ]);

        } catch (Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function edit(Request $request, $slug = null)
    {
        // GET 
        try {
            if ($request->method("GET") === "GET") {
                $tag = Tag::where("slug", $slug)->first();
                if (!$tag) {
                    throw new Exception("There is not tag with this name GET");
                }
                return view("adminDashboard.tag.edit_tag", ["tag" => $tag->toArray()]);
            }
        } 
        catch (Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
        // POST
        $new_tag_name = $request->input("new_tag_name");
        $new_slug = $request->input("new_slug");
        try{
            
            $old_tag_name = $request->input("old_tag_name");
            $tag = Tag::where("tag_name", $old_tag_name)->first();
            if (!$tag) {
                throw new Exception("There is not tag with this name");
            }
            $request->validate([
                'new_tag_name' => ["string", "min:3", "unique:tag, tag_name", function ($attribute, $value, $fail) use ($request) {
                    if ($request->filled('new_slug')) {
                        return;
                    }
                    // apply the different validation
                    $old_tag_name = $request->input('old_tag_name');
                    if ($value === $old_tag_name) {
                        $fail("The new tag name must be different from the old tag name.");
                    }
                }],
                "old_tag_name" => ["required", "string"],
                "new_slug"=>["min:3", "unique:tag, slug"]
            ]);
            $slug = $new_slug ?? $tag->toArry()["slug"]; // user does not have to change the slug
            $tag->tag_name = $new_tag_name;
            $tag->slug = $slug;
            $tag->save();
            return view("adminDashboard.tag.edit_tag", ["output" => ["success" => "You succesfully changed the tag"], "tag" => $tag]);
        
        }
        catch (Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function retunCategory($category)
    {

        $is_exist_category = Tag::where('tag_name', $category)->first();
        try {
            if ($is_exist_category !== null) {
                $is_exist_category->active = 1;
                $is_exist_category->save();
                return view('adminDashboard.category.add_category', ['output' => ['success' => 'Successfully returned category', "name_category" => $is_exist_category["name_category"]]]);
            }
            dd($is_exist_category);
            throw new Exception("There is not such category with this name");
        } catch (Exception $error) {
            abort(404);
        }
    }

    public function destroy($slug)
    {
        // it is not deleting tag just setting acitve = 0
        try {
            $tag = Tag::where("slug", $slug)->first();
            if ($tag === null) {
                throw new Exception("There is not such a tag");
            }
            $tag->active = 0;
            $tag->save();

            session(["output" => "Succsfully deleted tag (you can returned tag by try adding new tag)"]);
            return redirect("/admin/tags");

        } catch (Exception $error) {
            abort(404, $error);
        }
    }

}
