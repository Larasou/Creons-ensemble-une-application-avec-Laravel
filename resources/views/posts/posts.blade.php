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

            <div class="d-flex justify-content-end">
                <div class="ui labeled icon top right pointing dropdown button">
                    <i class="filter icon"></i>
                    <span class="text">Filter Posts</span>
                    <div class="menu">
                        <div class="ui search icon input">
                            <i class="search icon"></i>
                            <input type="text" name="search" placeholder="Search issues...">
                        </div>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="tags icon"></i>
                            Filter by tag
                        </div>
                        <div class="item">
                            <div class="ui red empty circular label"></div>
                            Important
                        </div>
                        <div class="item">
                            <div class="ui blue empty circular label"></div>
                            Announcement
                        </div>
                        <div class="item">
                            <div class="ui black empty circular label"></div>
                            Discussion
                        </div>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="calendar icon"></i>
                            Filter par catégorie
                        </div>
                        @forelse($categories as $category)
                            <div class="item">
                                <a href="{{ url("blog/{$category->slug}") }}"
                                   class="text-dark"
                                   style="text-decoration: none"
                                >
                                    <i class="{{ $category->icon }} {{ $category->color }}"></i>
                                    {{ $category->name }}
                                </a>
                            </div>
                            @empty
                            <div class="item">
                                <i class="olive circle icon"></i>
                                Pas de cétégorie
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="ui two column grid">
                @forelse($posts as $post)
                <div class="column">
                    <div class="ui raised segment">
                        <a href="{{ url("blog/{$post->category->slug}") }}" class="ui {{ $post->category->color }} ribbon label">{{ $post->category->name }}</a>
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
@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection