<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Category $category, Post $post) {
        $post->comments()->create(request()->all());
         return back();
    }
}
