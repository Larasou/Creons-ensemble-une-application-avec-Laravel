@extends('templates.default')

@section('meta-title', $title = "Chnager mon mot de passe")
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
                @method('PUT')

                <div class="six wide field">
                    <div class="ui left icon input">
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Ton mot de passe">
                        <i class="lock icon"></i>
                    </div>
                    {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                </div>

                <div class="six wide field">
                    <div class="ui left icon input">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirme ton mot de passe">
                        <i class="lock icon"></i>
                    </div>
                    {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
                </div>

                <div>
                    <button class="ui violet icon button big">
                        <i class="user plus icon"></i>
                        {{ $title }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection