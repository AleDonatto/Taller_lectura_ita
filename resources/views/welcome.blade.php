<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ITA Taller de Lectura</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">

        <!-- Styles -->
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
                font-size: 80px;
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
            img{
                margin-top: 115px;
            }
            .container{
                margin-top: 80px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a href="{{ route('singin') }}"><h5 class="left-align grey-text">Administrador</h5></a>
                </div>
                <div class="col s12">
                    <a href=""><h5 class="center-align grey-text">Profesores</h5></a>
                </div>
                <div class="col s12">
                    <a href=""><h5 class="right-align grey-text">Alumnos</h5></a>
                </div>
            </div>

            <div class="row">
                <div class="center-align">
                    <div class="col s2">
                        <img src="{{ asset('img/Libro.png') }}" alt="" class="circle responsive-img" width="120" height="120">
                    </div>
                    <div class=" title col s10">
                        <p>Taller de Lectura</p>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Taller de Lectura
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>-->


        <script src="{{ asset('js/materialize.min.js') }}"></script>
    </body>
</html>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taller de Lectura</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }} ">
</head>
<body class="grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2><span class="flow-text">Taller de Lectura</span></h2>
                <h2 class="blue-text">Taller de Lectura</h2>
            </div>
        </div>
    </div>
    

    <script src="asset('js/materialize.min.js')"></script>
</body>
</html>-->