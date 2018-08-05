<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta content="width=1300, initial-scale=1 user-scalable=yes" name="viewport"/>
    <meta content="@yield('meta-description')" name="description"/>
    <meta content="Larasou" name="author"/>
    <link href="/favicon.png" rel="icon" type="image/png" />
    <meta content="#ffffff" name="theme-color"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta-title')</title>
    <link rel="stylesheet" href="{{ secure_asset('dist/semantic.min.css') }}">
    @yield('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
       window.App = {!! json_encode([
            'user' => auth()->user(),
            'admin' => \App\User::admin(),
            'modo' => \App\User::modo(),
            'signedIn' => auth()->check(),
       ]) !!}
    </script>
</head>
<body class="theme">
<div class="pusher">
    <div id="app" class="content">
        @include('layouts.navigation')
        @include('layouts.flash')
       @guest()
            <login></login>
            <register></register>
        @endguest
        @yield('content')
        <flash message="{{ session('flash') }}" bg="{{ session('color') }}"></flash>
    </div>
    <footer>
        <div class="ui vertical stripe segment">
            <div class="ui container">
                <div class="ui stackable relaxed divided grid">
                    <div class="wide column">
                        <div class="ui list">
                            <div class="item text-center">
                                <strong>LaraBlog</strong>  © {{ date('Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ secure_asset('dist/semantic.min.js') }}"></script>
        @yield('js')
    </footer>
</div>

</body>
</html>