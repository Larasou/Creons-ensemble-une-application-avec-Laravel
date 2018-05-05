@extends('templates.default')

@section('meta-title', $title = "Mot de passe perdu")
@section('meta-description', $description  = "")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>

            <form action="" method="POST" class="ui form">
                @csrf

                <div class="eight wide tablet wide field">
                    <div class="ui left icon input">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur ou l'adresse email">
                        <i class="user icon"></i>
                    </div>
                    {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
                </div>



                <div>
                    <button class="ui violet icon button big">
                        <i class="user icon"></i>
                        {{ $title }}
                    </button>
                </div>
            </form>

            <div class="mt-5 text-center">
                <a href="{{ route('confirmation') }}" class="ui orange button">
                    Email de confirmation non reçu ?
                </a>
            </div>
        </div>
    </div>
@endsection