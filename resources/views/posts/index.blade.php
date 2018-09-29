@extends('templates.default')

@section('meta-title', $title = "Blog")
@section('meta-description', $description  = "Les derniers actus!")

@section('content')

  <div class="max-w-3xl mx-auto">
      <h2 class="ui huge header">
          {{ $title }}
          <div class="sub header">
              {{ $description }}
          </div>
      </h2>

      @include('layouts.filters')

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
@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection