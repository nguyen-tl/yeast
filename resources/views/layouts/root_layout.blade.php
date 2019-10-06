<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome Icons  -->
        <link href="{{ asset('font/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font/all.min.css') }}" rel="stylesheet">
        <script src="{{ asset('font/fontawesome.min.js') }}"></script>
        <script src="{{ asset('font/all.min.js') }}"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        @yield('css')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{asset('jquery/jquery-3.3.1.slim.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        @yield('content')
    </body>
    @yield('js')
</html>
