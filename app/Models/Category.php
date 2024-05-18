<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";

    protected $fillable = [
        'name_category'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, "id_author", 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
