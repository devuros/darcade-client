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
            <div class='container global-header'>

                @include('layouts.header')

            </div>
        </div>
        <div class='container-fluid global-content-wrapper'>

                @yield('content')

        </div>

        @if (!session()->has('user_id'))

            <div class='container-fluid' id='loginSection'>
                <div class='container home-page-content-wrapper'>
                    <div id='loginSectionGutter'></div>
                    <div id='loginSectionWrapper'>
                        <div id='loginSectionTop'>
                            <div class='dash-wrapper'>
                                <hr/>
                            </div>
                            <div class='dash-center'>
                                <h3>Looking for recommendations?</h3>
                            </div>
                            <div class='dash-wrapper'>
                                <hr/>
                            </div>
                        </div>
                        <div id='loginSectionBottom'>
                            <p>Sign in to view personalized recommendations</p>
                            <a class='link-buttton' href="{{ route('login') }}">Sign in</a>
                            {{-- <p>Or <a href="{{ route('register') }}">sign up</a> and join Darcade for free</p> --}}
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <div class='container-fluid global-footer-wrapper'>
            <div class='container global-footer'>

                @include('layouts.footer')

            </div>
        </div>
    </body>
</html>
