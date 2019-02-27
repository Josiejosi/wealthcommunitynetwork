<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    </head>

    <body>
        <div class="" id="home">
            @include( 'partials.nav' )
            <div class="container">
                
                <div class="row">
                    <div class="col">

                        @auth
                            <p class="text-white mt-5 mb-5">Welcome back, <b>{{ auth()->user()->name }}</b></p>
                        @else
                            <p class="text-white mt-5 mb-5"></p>
                        @endauth
                    </div>
                </div>
                
                <!-- row -->
                <div class="row tm-content-row">
                     @yield('content')
                </div>
            </div>

        </div>

        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. <a rel="nofollow noopener" href="{{ url( '/' ) }}" class="tm-footer-link">{{ config('app.name', 'Laravel') }}</a>
                </p>
                <h4 class="text-center text-info mb-0 px-4"><b>Support available from 8:00am till 21:00pm everyday, holidays included</b></h4>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>