@extends('templates.default')

@section('meta-title', $title = "Mon espace reservé!")
@section('meta-description', $description  = "")

@section('content')
    @component('account.header')
        Modifier mon pseudo!
        <hr>
        mon pseudo: <strong class="text-yellow-dark">{{ $user->name }}</strong>
    @endcomponent


    @include('account.menu')

    <div class="flex items-center justify-center max-w-3xl mx-auto my-5 px-2">
       <div class="w-full lg:w-3/5">
           <form action="{{ route('account.username.store', $user) }}" method="post">
               @csrf
               <div class="my-3 flex flex-col">
                   <input name="name" placeholder="Mon nouveau pseudo" type="text" class="bg-input">
                   {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
               </div>

               <div class="flex justify-end">
                   <button type="submit" class="btn bg-purple-dark md:w-1/2 text-white">
                       Changer mon epseudo
                   </button>
               </div>
           </form>
       </div>
    </div>

@endsection