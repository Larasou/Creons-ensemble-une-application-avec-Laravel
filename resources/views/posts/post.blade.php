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