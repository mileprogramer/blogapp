<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class NewTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag1 = new Tag();
        $tag1->tag_name = "article";
        $tag1->slug = "article";
        $tag1->save();
        
        $tag2 = new Tag();
        $tag2->tag_name = "news";
        $tag2->slug = "news";
        $tag2->save();

        $tag3 = new Tag();
        $tag3->tag_name = "breaking news";
        $tag3->slug = "breaking-news";
        $tag3->save();
    }
}
