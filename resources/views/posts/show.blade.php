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
                <a href="{{ url("{$post->path()}/edit") }}" class="ui mr-3 olive button icon">
                    <i class="edit icon"></i>
                    Editer
                </a>

                <form action="{{ url("{$post->path()}") }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ui red button icon">
                        <i class="trash icon"></i>
                       Supprimer
                    </button>
                </form>
            </div>

            <div>
                {!! $markdown->parse($post->body) !!}
            </div>

           <comments :comments="{{ $post->comments()->with('user')->latest()->get() }}"></comments>

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