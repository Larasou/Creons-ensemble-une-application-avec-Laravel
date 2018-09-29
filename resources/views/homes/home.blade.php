@extends('templates.default')

@section('meta-title', $title = "LaraBlog")
@section('meta-description', $description  = "Bienvenue sur LaraBlog!")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>
        </div>
    </div>

    <div class="max-w-3xl mx-auto">
        <h2>
            Top 6 des articles!
        </h2>
        <div class="flex flex-wrap w-full flex-col md:flex-row">
            @forelse($posts as $post)
                <a href="{{ $post->path }}" class="text-black hover:text-black hover:no-underline flex flex-col justify-between w-full md:w-1/3  p-3">
                    <img src="{{ $post->image }}" alt="{{ $post->name }}">

                    <h3 class="text-3xl my-3">
                        {{ $post->name }}
                    </h3>

                    <p>
                        {!!  $markdown->parse($post->description) !!}
                    </p>

                    <span class="text-right font-bold text-{{ $post->category->color }}-dark">
                      {{ $post->category->name }}
                  </span>
                </a>
                @endforeach
        </div>
    </div>
@endsection