
@php
$post->id ? $url = ['url' => $post->path, 'method' => 'PUT'] : $url =  ['url' => route('post.store'), 'method' => 'POST']
@endphp


{{ Form::model($post, $url) }}

 @csrf
    <div class="flex flex-col md:flex-row mt-3">
        {{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-error mr-3' : 'form-input mr-3', 'placeholder' => "Nom de l'article"]) }}
        {{ $errors->first('name', "<p class='font-bold text-red italic'>:message</p>") }}

        {{ Form::select('category_id', $categories, null, ['class' => $errors->has('category_id') ? 'form-error ml-3 uppercase' : 'form-input ml-3 uppercase']) }}
        {{ $errors->first('category_id', "<p class='font-bold text-red italic'>:message</p>") }}
    </div>

<div class="flex flex-col md:flex-row mt-3">
        {{ Form::text('image', null, ['class' => $errors->has('image') ? 'form-error mr-3' : 'form-input mr-3', 'placeholder' => "Image de l'article"]) }}
        {{ $errors->first('image', "<p class='font-bold text-red italic'>:message</p>") }}

        {{ Form::text('tags', $post->tagNames, ['class' => $errors->has('tags') ? 'form-error mr-3' : 'form-input mr-3', 'placeholder' => "Tagger l'article"]) }}
        {{ $errors->first('tags', "<p class='font-bold text-red italic'>:message</p>") }}
    </div>

    <div class="my-5 flex flex-col mt-3 md:flex-row">
        {{ Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-error mr-3' : 'form-input mr-3', 'rows' => 3, 'placeholder' => "Description de l'article"]) }}
        {{ $errors->first('description', "<p class='font-bold text-red italic'>:message</p>") }}
    </div>

    <div class="flex flex-col mt-3 md:flex-row">
        {{ Form::textarea('body', null, ['class' => $errors->has('body') ? 'form-error mr-3' : 'form-input mr-3', 'rows' => 10, 'placeholder' => "Coprs de l'article"]) }}
        {{ $errors->first('body', "<p class='font-bold text-red italic'>:message</p>") }}
    </div>

    @if ($post->id)
        <label for="notify" class="ml-2 font-weight-bold text-xl-center">
            <input type="checkbox" name="notify" id="notify">
            Notifier les utilisateurs
        </label>
    @endif

    <div class="w-full flex flex-row mt-5">
        <button type="submit" class="w-full px-6 font-weight-bold py-2 bg-blue text-white hover:bg-blue-dark">
            <i class="entypo-check"></i>
            Enregistrer
        </button>

       @if ($post->id)
            <a href="{{ $post->path }}" class="w-full hover:no-underline font-bold text-center px-6 py-2 bg-red text-white hover:bg-red-dark">
                <i class="fa-cancel"></i>
                Annuler
            </a>
       @endif
    </div>


{{ Form::close() }}