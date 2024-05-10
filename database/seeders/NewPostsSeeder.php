<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            [
                "id_category" => 1,
                "id_author" => 1,
                "title" => "Mine first post",
                "body" => "Text of mine first post is...",
                "date" => now(),
                "slug" => "first-post",
                "total_access" => 0,
            ],
            [
                "id_category" => 1,
                "id_author" => 1,
                "title" => "Mine second post",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit.",
                "date" => now(),
                "slug" => "second-post",
                "total_access" => 0,
            ]
        ]);
    }
}
