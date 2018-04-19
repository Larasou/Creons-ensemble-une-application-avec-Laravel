@extends('templates.default')

@section('meta-title', $title = "Publier un article")
@section('meta-description', $description  = "Publier un article")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>

            <form action="{{ route('post.store') }}" method="POST" class="ui form mt-5">
                @csrf
                <div class="two fields">
                    <div class="field">
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Nom de l'article">
                    </div>
                    <div class="field">
                        <select name="category_id" class="ui dropdown">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <textarea name="body" placeholder="Votre article" cols="30" rows="10">{{ old('body') }}</textarea>
                </div>
                <button type="submit" class="ui violet button icon">
                    <i class="check icon"></i>
                   Publier l'article
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