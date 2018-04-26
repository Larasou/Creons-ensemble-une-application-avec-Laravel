@extends('templates.default')

@section('meta-title', $title = "S'enregistrer")
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

                <div class="eight wide field">
                    <div class="ui left icon input">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur">
                        <i class="user icon"></i>
                    </div>
                    {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
                </div>

                <div class="two fields">
                    <div class="eight wide field">
                        <div class="ui left icon input">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Ton email">
                            <i class="at icon"></i>
                        </div>
                        {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
                    </div>

                    <div class="eight wide field">
                        <div class="ui left icon input">
                            <input type="email" name="email_confirmation" value="{{ old('email_confirmation') }}" placeholder="Confirme ton email">
                            <i class="at icon"></i>
                        </div>
                        {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                </div>

                <div class="two fields">
                    <div class="eight wide field">
                        <div class="ui left icon input">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Ton mot de passe">
                            <i class="lock icon"></i>
                        </div>
                        {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                    </div>

                    <div class="eight wide field">
                        <div class="ui left icon input">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirme ton mot de passe">
                            <i class="lock icon"></i>
                        </div>
                        {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                </div>

                <button class="ui violet big icon button">
                    <i class="user plus icon"></i>
                    {{ $title  }}
                </button>
            </form>
        </div>
    </div>
@endsection