@extends('templates.default')

@section('meta-title', $title = "Blog")
@section('meta-description', $description  = "Les derniers actus!")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>
            @include('layouts.filters')
            <div class="ui two column grid">
                @forelse($posts as $post)
                <div class="column">
                    <div class="ui raised segment">
                        <a href="{{ url("blog/{$post->category->slug}") }}" class="ui {{ $post->category->color }} ribbon label">{{ $post->category->name }}</a>
                        <span>
                            <a href="{{ url($post->path()) }}"
                               class="text-dark"
                               style="text-decoration: none">
                                {{ $post->name }}
                            </a>
                        </span>
                        <p class="mt-3">
                            {{ str_limit($post->body, 175)  }}
                        </p>
                        <a href="{{ url($post->path()) }}" class="ui orange right ribbon label">
                            Lire la suite...
                        </a>
                    </div>
                </div>
                    @empty
                    <div class="ui icon message mt-5">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="header">
                                Pas d'article pour l'instant
                            </div>
                            <p>
                                Désolé, jen 'ai pas trouvé un article
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection