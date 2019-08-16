<?php

namespace AQ_Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    public const DEFAULT_BADGE_COLOR = '#edf6fd';

    public $timestamps = false;

    protected $attributes = [ 'id', 'name', 'badge' ];

    protected $fillable = [ 'name', 'badge' ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function hasImageBadge(): bool
    {
        return isset($this->badge) && !Str::startsWith($this->badge, '#');
    }
}
