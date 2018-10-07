@extends('templates.default')

@section('meta-title', $title = "Les membres")
@section('meta-description', $description  = "La liste des membres")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>

            <div class="ui six column grid">
                @forelse($users as $user)
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="{{ $user->avatar }}">
                        </div>
                        <div class="content">
                            <a class="header text-center">{{ $user->name }}</a>
                        </div>
                    </div>
                </div>
                    @empty
                    <div class="ui icon message mt-5">
                        <i class="info icon"></i>
                        <div class="content">
                            <div class="header">
                               Pas d'utilisateur pour l'instant
                            </div>
                            <p>
                                Désolé, jen 'ai pas trouvé un utilisateur
                            </p>
                        </div>
                    </div>
               @endforelse
            </div>

        </div>
    </div>
@endsection