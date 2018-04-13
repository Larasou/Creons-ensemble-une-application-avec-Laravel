@extends('templates.default')

@section('meta-title', $title = "Edition de $post->name")
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

            <form action="{{ url($post->path()) }}" method="POST" class="ui form mt-5">
                @csrf
                @method('PUT')
                <div class="two fields">
                    <div class="field">
                        <input type="text" value="{{ $post->name }}" name="name" placeholder="Nom de l'article">
                    </div>
                    <div class="field">
                        <select name="category_id" class="ui dropdown">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ $post->category->id === $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <textarea name="body" placeholder="Votre article" cols="30" rows="10">{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="ui orange button icon">
                    <i class="check icon"></i>
                    Mettre à jour
                </button>
            </form>


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