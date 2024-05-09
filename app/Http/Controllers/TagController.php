<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::where('active', 1)->get()->toArray();
        return view("adminDashboard.tag.all_tags", ["all_tags" => $tags]);
    }

    public function store(Request $request): View
    {
        $tag_name = $request->input('tag_name');
        $request->validate([
            'tag_name' => ['required', 'string', 'min:3'],
        ]);

        try {
            $existing_tag = Tag::where('tag_name', $tag_name)->first();

            if ($existing_tag) {
                if ($existing_tag->active === 0) {
                    // Tag exsit ask you user to reactivate it
                    $existing_tag->active = 1;
                    $existing_tag->save();
                    return view('adminDashboard.category.add_tag', ['output' => ['return_tag' => 'There is already tag with this name but is unactive', "name_category"=>$existing_tag->tag_name]]);
                } 
                else{
                    throw new Exception('There is already an active tag with this name');
                }
            } 
            else {
                $new_tag = new Tag();
                $new_tag->tag_name = $tag_name;
                $new_tag->save();

                return view('adminDashboard.tag.add_tag', [
                    'output' => ['success' => 'You successfully added the new tag']
                ]);
            }
        } catch (Exception $error) {
            return view('adminDashboard.tag.add_tag', ['output' => ['mistake' => $error->getMessage()]]);
        }
    }

    public function edit(Request $request, $param_tag_name = null)
    {
        $new_tag_name = $request->input("new_tag_name");
        $old_tag_name = $request->input("old_tag_name");

        if ($request->method("GET") === "GET") {
            return view("adminDashboard.tag.edit_tag", ["tag_name" => $param_tag_name]);
        }
        // code for POST METHOD
        $request->validate([
            'new_tag_name' => ["required", "string", "min:3", "unique:tag, tag_name", "different:old_tag_name"],
            "old_tag_name" => ["required", "string"]
        ]);

        try {

            $edit_tag = Tag::where("tag_name", $old_tag_name)->first();
            if (!$edit_tag) {
                throw new Exception("There is not tag with this name");
            }
            $edit_tag->tag_name = $new_tag_name;
            $edit_tag->save();
            return view("adminDashboard.tag.edit_tag", ["output" => ["success" => "You succesfully changed the tag"], "tag_name" => $new_tag_name]);
        } catch (Exception $error) {
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

    public function destroy($name_category)
    {
        // it is not deleting category just setting acitve = 0
        try {
            $category = Tag::where("name_category", $name_category)->first();
            if ($category === null) {
                throw new Exception("There is not such a category");
            }
            $category->active = 0;
            $category->save();

            session(["output" => "Succsfully deleted category (you can returned category by try adding new category)"]);

            return redirect("/admin/categories");
        } catch (Exception $error) {
            abort(404, $error);
        }
    }
}
