<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $attributes = [ 'id', 'name', 'badge' ];

    protected $fillable = [ 'name', 'badge' ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
