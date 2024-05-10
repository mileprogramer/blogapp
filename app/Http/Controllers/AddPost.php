<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class AddPost extends Controller
{
    // collect all categories 
    // collect all tags
    //call the view and send the data

    public function index(){
        $all_categories = Category::all()->toArray();
        $all_tags = Tag::all()->toArray();
        return view("adminDashboard.add_post", ["categories" =>$all_categories, "tags"=>$all_tags]);
    }
}
