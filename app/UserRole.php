<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;

    protected $attributes = [ 'user', 'role' ];

    protected $fillable = [ 'user', 'role' ];

    protected $casts = [ 'user' => User::class, 'role' => Role::class ];
}
