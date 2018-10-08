@extends('templates.default')

@section('meta-title', $title = "Mon espace reservé!")
@section('meta-description', $description  = "")

@section('content')
  @component('account.header')
      Bienvenue <?php echo e(auth()->user()->name); ?> dans ton espace réservé! ;-)
  @endcomponent

   @include('account.menu')
@endsection