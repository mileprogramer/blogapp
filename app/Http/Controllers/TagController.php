<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\SlugHelper;
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

        } catch (\Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function edit($slug = null)
    {
        try {
            $tag = Tag::where("slug", $slug)->first();
            if (!$tag) {
                throw new Exception("There is not tag with this name GET");
            }
            return view("adminDashboard.tag.edit_tag", ["tag" => $tag->toArray()]);
        } 
        catch (\Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try{
            
            $old_tag_name = $request->input("old_tag_name");
            $tag = Tag::where("tag_name", $old_tag_name)->first();
            if (!$tag) {
                throw new Exception("There is not tag with this name");
            }         

            $rules = [];

            if ($request->filled('new_tag_name') && $request->input('new_tag_name') !== $tag->tag_name) {
                $rules['new_tag_name'] = 'string|min:3|unique:tag,tag_name';
            }
        
            if ($request->filled('new_slug') && $request->input('new_slug') !== $tag->slug) {
                $rules['new_slug'] = 'string|min:3|unique:tag,slug';
            }
            
            (empty($rules))? throw new Exception("You did not change anything") : $request->validate($rules);
            (isset($rules['new_tag_name']))? $tag->tag_name = $request->input('new_tag_name') : null;
            (isset($rules['new_slug']))? $tag->slug = $request->input("new_slug") : null;
            $tag->save();
            return view("adminDashboard.tag.edit_tag", ["output" => ["success" => "You succesfully changed the tag"], "tag" => $tag]);
        
        }
        catch (\Exception $error) {
            return redirect()->back()->withInput()->withErrors(['error' => $error->getMessage()]);
        }
    }

    public function returnTag($tag_name)
    {
        $tag = Tag::where('tag_name', $tag_name)->first();
        try {
            if ($tag === null) {
                throw new Exception("There is not such category with this name");
            }
            $tag->active = 1;
            $tag->save();
            return view('adminDashboard.category.add_category', ['output' => ['success' => 'Successfully returned tag', "tag_name" => $tag->tag_name]]);
            
        } catch (\Exception $error) {
            abort(404, $error->getMessage());
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

            session(["success" => "Successfully deleted tag (you can returned tag by try adding new tag)"]);
            return redirect("/admin/tags");

        } catch (\Exception $error) {
            abort(404, $error);
        }
    }

}
