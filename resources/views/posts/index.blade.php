@extends('templates.default')

@section('meta-title', $title = "Blog")
@section('meta-description', $description  = "Les derniers actus!")

@section('content')
    @include('layouts.min-nav')

  <div class="max-w-3xl mx-auto">
      <h2 class="ui huge header">
          {{ $title }}
          <div class="sub header">
              {{ $description }}
          </div>
      </h2>

      @include('layouts.filters')

      @include('layouts.posts_all',  ['view' => true])
  </div>
@endsection
@section('js')
    <script>
        $('.ui.dropdown')
            .dropdown()
        ;
    </script>
@endsection