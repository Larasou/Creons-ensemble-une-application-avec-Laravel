@extends('templates.default')

@section('meta-title', $title = "Publier un article")
@section('meta-description', $description  = "Publier un article")

@section('content')
    <div class="max-w-3xl mx-auto">
        <h3>
            Créer un article
        </h3>
        @include('posts.form')
    </div>
@endsection
@section('js')

@endsection