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
    <title>@yield('meta-title')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('dist/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('dist/theme.min.css') }}">
    <script src="{{ secure_asset('dist/jquery.min.js') }}"></script>
    @yield('css')
</head>
<body class="theme">
<div class="pusher">
    <div id="content">
        @include('layouts.navigation')
        @yield('content')
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
        <script src="{{ secure_asset('dist/semantic.min.js') }}"></script>
        @yield('js')
    </footer>
</div>

</body>
</html>