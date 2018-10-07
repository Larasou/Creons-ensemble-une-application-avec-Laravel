@extends('templates.default')

@section('meta-title', $title = $user->name)
@section('meta-description', "Profil de $user->name")
@section('meta-image', $user->avatar)
@section('meta-created_at', $user->created_at)
@section('meta-updated_at', $user->updated_at)
@section('meta-url', request()->fullUrl())

@section('content')
    
    <div class="bg-indigo-darker text-white w-full h-full " style="height: 250px">
        <div class="max-w-3xl mx-auto pt-5">
            <div class="flex flex-col-reverse h-full md:flex-row justify-between items-center">
                <div class="flex flex-col  md:flex-row items-center">
                    <div class="m-3 text-center font-extrabold">
                        <h2 class="text-4xl">{{ $user->tutorials->count() }}</h2>
                        <h3 class="text-3xl">
                            Tutoriels
                        </h3>
                    </div>
                    <div class="m-3 text-center font-extrabold">
                        <h2 class="text-4xl">{{ $user->posts->count() }}</h2>
                        <h3 class="text-3xl">
                            Articles
                        </h3>
                    </div>
                    <div class="m-3 text-center font-extrabold">
                        <h2 class="text-4xl">{{ $user->comments->count() }}</h2>
                        <h3 class="text-3xl">
                            Commentaires
                        </h3>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <img height="150" width="150" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                    <h3 class="mt-3 text-3xl font-bold">
                        {{ "@$user->name" }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto mt-3">
        <h3 class="text-3xl font-bold">
            Mes activités
        </h3>
        
      @include('tutorials.profile_complete', ['activities' => $activities])
    </div>
    
@endsection
@section('js')
@endsection