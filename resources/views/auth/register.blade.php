@extends('templates.default')

@section('meta-title', $title = "S'enregistrer")
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
               <div class="six wide field">
                   <input type="text" value="{{ old('name') }}" name="name" placeholder="Nom d'utilisateur">
                   {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
               </div>

                <div class="rwo fields">
                    <div class="six wide field">
                        <input type="text" value="{{ old('email') }}" name="email" placeholder="Email">
                        {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                    <div class="six wide field">
                        <input type="text" value="{{ old('email') }}" name="email_confirmation" placeholder="Confirmez email">
                        {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                </div>

                <div class="rwo fields">
                    <div class="six wide field">
                        <input type="password" value="{{ old('password') }}" name="password" placeholder="Mot de passe">
                        {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                    <div class="six wide field">
                        <input type="password" value="{{ old('password') }}" name="password_confirmation" placeholder="Confirmez mot de passe">
                        {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                </div>

                <button type="submit" class="ui violet icon button">
                    <i class="user plus icon"></i>
                    S'enregistrer
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