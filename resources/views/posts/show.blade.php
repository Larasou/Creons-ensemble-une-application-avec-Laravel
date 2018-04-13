@extends('templates.default')

@section('meta-title', $title = $post->name)
@section('meta-description', $description  = str_limit($post->body, 35))

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ url("{$post->path()}/edit") }}" class="ui olive button icon">
                    <i class="edit icon"></i>
                    Editer
                </a>
            </div>

            <div>
                {!! $post->body !!}
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