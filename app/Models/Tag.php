<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";

    protected $fillable = [
        'tag_name',
        'slug'
    ];

    public function postTags()
    {
        return $this->hasMany(PostTag::class, 'tag_id');
    }
}
