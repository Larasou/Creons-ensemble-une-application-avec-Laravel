@extends('templates.default')

@section('meta-title', $title = $user->name)
@section('meta-description', $user->description)
@section('meta-image', $user->avatar)
@section('meta-created_at', $user->created_at)
@section('meta-updated_at', $user->updated_at)
@section('meta-url', request()->fullUrl())

@section('content')
    <div class="bg-profile">
        <div class="max-w-3xl mx-auto text-white">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between">
                <div class="flex flex-col md:flex-row my-3 md:my-0">
                    <div class="p-3 font-bold text-center">
                        <h2 class="text-4xl">{{ $user->tutorials->count() }}</h2>
                        <h3 class="text-3xl">Tutoriels</h3>
                    </div>

                    <div class="p-3 font-bold text-center">
                        <h2 class="text-4xl">{{ $user->posts->count() }}</h2>
                        <h3 class="text-3xl">Articles</h3>
                    </div>

                    <div class="p-3 font-bold text-center">
                        <h2 class="text-4xl">{{ $user->comments->count() }}</h2>
                        <h3 class="text-3xl">Commentaires</h3>
                    </div>
                </div>

                <div class="py-3">
                    <img height="150" width="150" src="{{ $user->avatar }}" alt="{{ $user->name }}">

                    <h3 class="text-3xl mt-3">
                        {{ "@$user->name" }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto mt-2">
        <h3 class="font-bold">
            Mes activités
        </h3>
    </div>
@endsection
@section('js')
  
@endsection