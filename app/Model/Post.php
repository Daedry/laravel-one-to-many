<?php

namespace App\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'cover_image'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
