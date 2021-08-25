<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'tag_id',
    ];

    public function scopeGetRelatedPosts($query, $tag_id)
    {
        return $query->where('tag_id', $tag_id);
    }
}
