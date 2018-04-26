@extends('templates.default')

@section('meta-title', $title = "Se connecter")
@section('meta-description', $description  = "!")

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

                <div class="six wide field">
                    <div class="ui left icon input">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur">
                        <i class="user icon"></i>
                    </div>
                    {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
                </div>


                <div class="six wide field">
                    <div class="ui left icon input">
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Ton mot de passe">
                        <i class="lock icon"></i>
                    </div>
                    {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                </div>

                <input type="hidden" name="redirect"
                       value="{{ $_SERVER['HTTP_REFERER'] ?? '/' }}">

               <div class="mt-3 mb-3">
                   <div class="ui checkbox">
                       <input type="checkbox" value="1" id="remember" name="remember">
                       <label for="remember">Se soucveir de moi</label>
                   </div>
               </div>

               <div>
                   <button class="ui violet big icon button">
                       <i class="user plus icon"></i>
                       {{ $title  }}
                   </button>
               </div>
            </form>

            <div class="col-4 mt-5">
                <a href="{{ route('register') }}" class="ui fluid olive button">S'enregistrer</a>
            </div>
        </div>
    </div>
@endsection