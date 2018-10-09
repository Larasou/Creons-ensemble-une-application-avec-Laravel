@extends('templates.default')

@section('meta-title', $title = "Mon espace reservé!")
@section('meta-description', $description  = "")

@section('content')
    @component('account.header')
        Modifier mon adresse email!
        <hr>
        mon email: <strong class="text-yellow-dark">{{ $user->email }}</strong>
    @endcomponent


    @include('account.menu')

    <div class="flex items-center justify-center max-w-3xl mx-auto my-5 px-2">
       <div class="w-full lg:w-3/5">
           <form action="{{ route('account.email.store', $user) }}" method="post">
               @csrf
               <div class="my-3 flex flex-col">
                   <input name="email" placeholder="Mon adresse email" type="email" class="bg-input">
                   {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
               </div>

               <div class="my-3 flex flex-col">
                   <input name="email_confirmation" placeholder="Confirmer mon adresse email" type="email" class="bg-input">
                   {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
               </div>

               <div class="flex justify-end">
                   <button type="submit" class="btn bg-orange-dark md:w-1/2 text-white">
                       Changer mon email
                   </button>
               </div>
           </form>
       </div>
    </div>

@endsection