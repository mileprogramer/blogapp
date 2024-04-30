<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tag")->insert([
            [
                "tag_name"=>"Soccer"
            ],
            [
                "tag_name"=>"Basketball"
            ]
        ]);
    }
}
