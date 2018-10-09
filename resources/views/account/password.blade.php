@extends('templates.default')

@section('meta-title', $title = "Mon espace reservé!")
@section('meta-description', $description  = "")

@section('content')
    @component('account.header')
         mon mot de passer!
    @endcomponent


    @include('account.menu')

    <div class="flex items-center justify-center max-w-3xl mx-auto my-5 px-2">
       <div class="w-full lg:w-3/5">
           <form action="{{ route('account.password.store', $user) }}" method="post">
               @csrf
               <div class="my-3 flex flex-col">
                   <input name="password" placeholder="Mon mot de passe" type="password" class="bg-input">
                   {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
               </div>

               <div class="my-3 flex flex-col">
                   <input name="password_confirmation" placeholder="Confirmer mon mot de passe" type="password" class="bg-input">
                   {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
               </div>

               <div class="flex justify-end">
                   <button type="submit" class="btn bg-red-dark md:w-1/2 text-white">
                       Changer mon mot de passe
                   </button>
               </div>
           </form>
       </div>
    </div>

@endsection