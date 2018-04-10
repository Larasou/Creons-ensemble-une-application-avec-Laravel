<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.posts', [
            'posts' => Post::latest()->get(),
        ]);
    }
}
