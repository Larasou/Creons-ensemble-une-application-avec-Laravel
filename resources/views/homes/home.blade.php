@extends('templates.default')

@section('meta-title', $title = "LaraBlog")
@section('meta-description', $description  = "Bienvenue sur LaraBlog!")

@section('content')
    @include('layouts.min-nav')

    <div class="max-w-3xl mx-auto">
    <div class="mb-5">
        <h2>
            Les 3 derniers articles!
        </h2>

        @include('layouts.posts_all', [
        'posts' => $lastPosts,
        'view' => false
        ])
    </div>

      <div>
          <h2>
              Top 6 des articles!
          </h2>

          @include('layouts.posts_all',  ['view' => true])
      </div>
    </div>
@endsection