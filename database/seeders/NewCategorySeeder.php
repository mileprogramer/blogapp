<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = new Category();
        $category1->name_category = "Sports";
        $category1->save();

        $category2 = new Category();
        $category2->name_category = "Politics";
        $category2->save();
        
        $category3 = new Category();
        $category3->name_category = "Programming";
        $category3->save();
        
        $category4 = new Category();
        $category4->name_category = "Fashion";
        $category4->save();

    }
}
