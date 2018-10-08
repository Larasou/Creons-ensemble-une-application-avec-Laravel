@extends('templates.default')

@section('meta-title', $title = "Blog")
@section('meta-description', $description  = "Les derniers actus!")

@section('content')

  <div class="max-w-3xl mx-auto">
      @include('layouts.min-nav')

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