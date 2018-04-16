<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index']);
    }

    public function index(Category $category, Post $post) {
        $comments = $post->comments()->with('user')->latest()->get();
         return $comments;
    }

    public function store(Category $category, Post $post) {
        $comment = $post->comments()->create(request()->all());
        return $comment->load('user');
    }

    public function update(Category $category, Post $post, Comment $comment) {
        $comment->update(request()->all());
        return response("Ton commentaire a bien été mise à jour!");
    }

    public function destroy(Category $category, Post $post, Comment $comment) {
        $comment->delete();
        return response("Ton commentaire a bien été surpprimé!");
    }
}
