<?php

namespace App\Http\Controllers\Posts;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostSubscribesController extends Controller
{
    public function store($category, Post $post)
    {
        $post->subscribe();
    }

    public function destroy($category, Post $post)
    {
        $post->unsubscribe();
    }
}
