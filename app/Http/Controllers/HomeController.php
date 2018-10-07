<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homes.home', [
            'lastPosts' => Post::orderByDesc('created_at')->limit(3)->get(),
            'posts' => visits('App\Post')->top(6)
        ]);
    }
}
