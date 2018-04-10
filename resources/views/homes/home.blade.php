@extends('templates.default')

@section('meta-title', $title = "LaraBlog")
@section('meta-description', $description  = "Bienvenue sur LaraBlog!")

@section('content')
    <div class="ui vertical segment">
        <div class="ui container">
            <h2 class="ui huge header">
                {{ $title }}
                <div class="sub header">
                    {{ $description }}
                </div>
            </h2>
        </div>
    </div>
@endsection