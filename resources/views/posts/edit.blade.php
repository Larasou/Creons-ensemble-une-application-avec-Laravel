@extends('templates.default')

@section('meta-title', $title = "Edition de $post->name")
@section('meta-description', $description  = str_limit($post->body, 35))

@section('content')
   <div class="max-w-3xl mx-auto">
       <h3 class="mb-5">
           Édition de l'article: <span class="font-bold text-indigo-dark">{{ $post->name }}</span>
       </h3>
       @include('posts.form')
   </div>
@endsection
@section('js')

@endsection