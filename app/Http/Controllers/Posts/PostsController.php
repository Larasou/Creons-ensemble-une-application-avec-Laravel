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
        ]);
    }

    public function show(Category $category, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Category $category, Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Category $category, Post $post)
    {
        $post->update(request()->all());
        return redirect($post->path());
    }

    public function destroy(Category $category, Post $post)
    {
        $post->delete();

        return redirect()->route('blog');
    }
}
