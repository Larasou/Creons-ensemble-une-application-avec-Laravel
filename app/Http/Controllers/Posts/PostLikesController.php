<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostLikesController extends Controller
{
    public function store($category, Post $post)
    {
        $post->like();
    }

    public function destroy($category, Post $post)
    {
        $post->unlike();
    }
}
