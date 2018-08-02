<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index(Category $category, Post $post)
    {
        $comments = $post->comments()->orderByDesc('created_at')->get();

        return response($comments, 200);
    }
}
