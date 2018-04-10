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

            <div class="ui two column grid">
                @forelse($posts as $post)
                <div class="column">
                    <div class="ui raised segment">
                        <a class="ui {{ $post->category->color }} ribbon label">{{ $post->category->name }}</a>
                        <span>{{ $post->name }}</span>
                        <p class="mt-3">
                            {{ str_limit($post->body, 175)  }}
                        </p>
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