<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    public $timestamps = false;

    protected $attributes = ['user_id', 'permission', 'granted'];

    protected $fillable = ['user_id', 'permission', 'granted'];

    protected $casts = [
        'user_id' => User::class,
        'granted' => 'boolean'
    ];
}
