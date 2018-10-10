@extends('templates.default')

@section('meta-title', $title = "Mon espace reservé!")
@section('meta-description', $description  = "")

@section('content')
    @component('account.header')
        Modifier mon avatar!
    @endcomponent


    @include('account.menu')

    <avatar :user="{{ $user}}"></avatar>

@endsection