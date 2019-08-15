<?php

namespace AQ_Blog;

use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return Post::all()->where('author', '=', $this->getAttribute('id'));
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function primary_role()
    {
        return $this->roles()->first();
    }

    public function online(): bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
