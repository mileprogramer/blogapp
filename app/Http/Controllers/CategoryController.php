<?php


namespace App\Http\Controllers;

use App\Helpers\SlugHelper;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    public function index() {
        $categories = Category::where('active', 1)->get()->toArray();
        return view("adminDashboard.category.all_categories", ["all_categories" => $categories]);
    }

    public function store(Request $request) {
        $category = Category::where('name_category', $request->input("name_category"))->first();
        try{
            if($category === null){
                $request->validate([
                    "name_category"=>"string|min:3|unique:category,name_category"
                ]);

                $new_category = new Category();
                $new_category->name_category = $request->input("name_category");
                $new_category->slug = SlugHelper::generateSlug($request->input("name_category"));
                $new_category->save();
                if($new_category->id){
                    return view('adminDashboard.category.add_category', ['output' => ['success' => 'You successfully added new category']]);
                }
            }
            elseif($category->toArray()["active"] === 0){
                return view('adminDashboard.category.add_category', ['output' => ['return_category' => 'There is already category with this name but is unactive', "category"=>$category->toArray()]]);
            }
            else{
                throw new Exception("There is already category with this name");
            }

        }
        catch(Exception $error){
            return view("adminDashboard.category.add_category", ["output"=>["mistake"=>$error->getMessage()]]);
        }
    }

    public function edit(Category $category)
    {
        return view("adminDashboard.category.edit_category",
        [
            "output" => [],
            "category"=>$category->toArray()
        ]);
    }

    public function update(Request $request)
    {
        $name_category = $request->input("name_category");
        $now_name_category = $request->input("now_name_category");
        if($name_category === $now_name_category){
            return view([
                "output" => ["mistake"=>"You did not change the value of name category"],
                "category" => $now_name_category
            ]);
        }
        try{
            $category = Category::where("name_category", $now_name_category)->first();
            if($category === null){
                throw new Exception("There is not category with $now_name_category name");
            }
            $category->name_category = $name_category;
            $category->save();
            
            return view("adminDashboard.category.edit_category", [
                'output' => [
                    'success' => 'You successfully changed the category'
                ],
                'category' => $category->toArray()
            ]);
            
        }
        catch(Exception $error){
            return view("adminDashboard.category.edit_category", ["output"=>["mistake"=>"Some mistake happend {$error->getMessage()}"], "name_category"=>$now_name_category]);
        }
        
    }

    public function returnCategory($slug) {
        try{
            $category = Category::where('slug', $slug)->firstOrFail();
            $category->active = 1;
            $category->save();
            return view('adminDashboard.category.add_category', [
                'output' => ['success' => 'Successfully returned category', 
                "name_category"=>$category["name_category"]]
            ]);
            throw new Exception("There is not such category with this name");
        }
        catch(Exception $error){
            abort(404);
        }

    }

    public function destroy($name_category){
        // it is not deleting category just setting acitve = 0
        try{
            $category = Category::where("name_category", $name_category)->first();
            if($category === null){
                throw new Exception("There is not such a category");
            }
            $category->active = 0;
            $category->save();

            session(["output"=>"Succsfully deleted category (you can returned category by try adding new category)"]);

            return redirect("/admin/categories");
        }
        catch(Exception $error){
            abort(404, $error);
        }
    }
}
