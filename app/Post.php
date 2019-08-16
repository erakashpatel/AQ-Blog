<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $attributes = ['id', 'title', 'short_description', 'long_description', 'author_id'];

    protected $fillable = ['title', 'short_description', 'long_description', 'author_id'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
