<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    public $timestamps = false;

    protected $attributes = ['role_id', 'permission', 'granted'];

    protected $fillable = ['role_id', 'permission', 'granted'];

    protected $casts = [
        'role_id' => Role::class,
        'granted' => 'boolean'
    ];
}
