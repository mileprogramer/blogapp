<?php 

namespace App\Helpers;

class SlugHelper
{
    public static function generateSlug($tag_name)
    {
        $hasSpace = explode(" ", $tag_name);
        $slug = isset($hasSpace[1]) ? implode("-", $hasSpace) : $hasSpace[0];
        return strtolower($slug);
    }
}
