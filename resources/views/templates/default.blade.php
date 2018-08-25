<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description')">

    <meta http-equiv="content-language" content="fr" />
    <meta name="language" content="fr" />
    <meta name="copyright" content="//larasou.com" />
    <meta name="author" content="Larasou.com" />
    <meta property="og:image" content="@yield('meta-image')" />
    <meta property="og:created_time" content="@yield('meta-created_at')" />
    <meta property="og:updated_time" content="@yield('meta-updated_at')" />

    <meta property="og:locale" content="fr" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('meta-title')" />
    <meta property="og:url" content="@yield('meta-url')" />
    <meta property="og:site_name" content="Soulouf.com" />
    <meta property="og:description" content="@yield('meta-description')" />
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