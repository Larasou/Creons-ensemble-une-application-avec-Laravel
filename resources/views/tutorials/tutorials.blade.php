@extends('templates.default')

@section('meta-title', $title = "Tutotiels")
@section('meta-description', $description  = "Tous nos derniers tutos!")

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