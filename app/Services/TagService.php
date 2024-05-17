<?php

namespace App\Services;

use App\Models\PostTag;
use App\Models\Tag;

class TagService
{
    public static function compareTags(array $new_tags, array $existing_tags):array
    {
        $tags_to_add = array_values(array_diff($new_tags, $existing_tags));
        $tags_to_remove = array_values(array_diff($existing_tags, $new_tags));

        if (empty($tags_to_add) && empty($tags_to_remove)) {
            return [];
        }

        return ["tags_to_add" => $tags_to_add, "tags_to_remove" => $tags_to_remove];
    }

    public static function existingTags(array $tags_to_check):bool
    {
        try {
            $existing_tags = Tag::whereIn('tag_name', $tags_to_check)->pluck('tag_name')->toArray();
        } catch (\Throwable $th) {
            return response()->json(["error"=>"You can add tags that are already added via admin dashboard tag->add tag $tags_to_check"], 500);
        }
        
        if(count($tags_to_check) === count($existing_tags)){
            return true;
        }
        return false;
    }
}
