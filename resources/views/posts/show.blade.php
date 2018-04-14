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

            <div class="mt-5">
                <div class="ui comments">
                    <form action="{{ url("{$post->path()}/comment") }}" method="POST" class="ui form">
                        @csrf
                        <div class="field">
                            <textarea name="body" rows="3"></textarea>
                        </div>
                       <div class="d-flex justify-content-end">
                           <button type="submit" class="ui orange submit icon button">
                               <i class="icon comment"></i> Commenter
                           </button>
                       </div>
                    </form>
                    @foreach($post->comments()->latest()->get() as $comment)
                        <div class="comment">
                        <a class="avatar">
                            <img src="{{ $comment->user->avatar }}">
                        </a>
                        <div class="content">
                            <a class="author">
                                {{ $comment->user->name }}
                            </a>
                            <div class="metadata">
                                <div class="date">
                                    {{ $comment->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="text">
                                {!! $markdown->parse($comment->body) !!}
                            </div>
                            <div class="actions">
                                <a class="reply">Reply</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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