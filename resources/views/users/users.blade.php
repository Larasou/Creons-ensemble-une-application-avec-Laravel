@extends('templates.default')

@section('meta-title', $title = "Les membres")
@section('meta-description', $description  = "La liste des membres")

@section('content')
    @include('layouts.min-nav')

    <div class="max-w-3xl mx-auto"><div class="flex flex-wrap justify-between items-center w-full">
            @forelse($users as $user)
                <a href="{{ $user->path }}" class="p-3 flex flex-col items-center hover:no-underline">
                    <img width="130" height="130" src="{{ $user->avatar }}" alt="{{ $user->naùe }}">
                    {{ "@$user->name" }}
                </a>
                @endforeach
        </div>div>
    </div>
@endsection