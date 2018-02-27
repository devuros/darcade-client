<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <div class='container-fluid global-above-header-wrapper'></div>
        <div class='container-fluid global-header-wrapper'>
            <div class='container global-header app-global-container'>
                @include('layouts.header')
            </div>
        </div>
        <div class='container-fluid global-content-wrapper'>
            <div class='container app-global-container'>
                @yield('content')
            </div>
        </div>
        <div class='container-fluid global-footer-wrapper'>
            <div class='container global-footer app-global-container'>
                @include('layouts.footer')
            </div>
        </div>
    </body>
</html>