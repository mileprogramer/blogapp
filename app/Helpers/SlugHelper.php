<?php 

namespace App\Helpers;

class SlugHelper
{
    public static function generateSlug($potenial_slug)
    {
        $hasSpace = explode(" ", $potenial_slug);
        $slug = isset($hasSpace[1]) ? implode("-", $hasSpace) : $hasSpace[0];
        return strtolower($slug);
    }
}
