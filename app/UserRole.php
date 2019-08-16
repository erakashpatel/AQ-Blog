<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;

    protected $attributes = ['user_id', 'role_id'];

    protected $fillable = ['user_id', 'role_id'];

    protected $casts = ['user_id' => User::class, 'role_id' => Role::class];
}
