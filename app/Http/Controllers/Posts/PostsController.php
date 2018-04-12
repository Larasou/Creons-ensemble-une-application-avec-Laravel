<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(Category $category)
    {
       if ($category->exists) {
           $posts = $category->posts()->latest()->get();
       }else {
           $posts = Post::latest()->get();
       }
        return view('posts.posts', [
            'posts' => $posts,
            'categories' => Category::get(),
        ]);
    }

    public function show(Category $category, Post $post)
    {
        return view('posts.post', [
            'post' => $post,
        ]);
    }
}
