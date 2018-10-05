<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Notifications\PostWasUpdated;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Category $category)
    {
       if ($category->exists) {
           $posts = $category->posts()->latest()->get();
       }
       elseif (request('tags')){
           $posts = Post::withAllTags(request('tags'))->get();
       } else {
           $posts = Post::orderByDesc('created_at')->get();
       }
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create', [
        'post' => new Post(),
        'categories' => Category::pluck('name', 'id'),
    ]);
    }

    public function store(Request $request)
    {
        $post = auth()->user()->posts()->create($request->all());

        $post->load('tagged')->tag($request->tags);

        return redirect($post->path());
    }

    public function show(Category $category, Post $post)
    {

        $post->visits()->increment();

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Category $category, Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    public function update(Category $category, Post $post)
    {
        $post->update(request()->all());

        $post->load('tagged')->retag(request()->tags);

        if (\request()->notify) {
            $post->subscriptions
                ->each(function ($sub) use($post) {
                    $sub->user->notify(new PostWasUpdated($post));
                });
        }


        return redirect($post->path)
            ->with([
                'flash' => "L'article $post->name a bien été mise à jour!",
            ]);
    }

    public function destroy(Category $category, Post $post)
    {
        $post->delete();

        return redirect()->route('blog');
    }
}
