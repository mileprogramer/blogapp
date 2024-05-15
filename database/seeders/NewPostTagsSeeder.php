<?php

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewPostTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // adding one tag to the post 1
        $tagPost1 = new PostTag();
        $tagPost1->tag_id = 1;
        $tagPost1->post_id = 1;
        $tagPost1->save();
        
        // adding second tag to the post 1
        $tagPost2 = new PostTag();
        $tagPost2->tag_id = 2;
        $tagPost2->post_id = 1;
        $tagPost2->save();
        
        // adding first tag to the post 2
        $tagPost3 = new PostTag();
        $tagPost3->tag_id = 1;
        $tagPost3->post_id = 2;
        $tagPost3->save();
        
        $tagPost4 = new PostTag();
        $tagPost4->tag_id = 2;
        $tagPost4->post_id = 2;
        $tagPost4->save();
    }
}
