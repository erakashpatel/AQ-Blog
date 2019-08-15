<?php

namespace AQ_Blog\Http\Controllers;

use AQ_Blog\Post;
use AQ_Blog\User;

class IndexController extends Controller
{
    public function index() {
        return view('index', [
            'users' => User::all(),
            'posts' => Post::all(),
            'recent_posts' => Post::all()->take(10),
        ]);
    }
}
