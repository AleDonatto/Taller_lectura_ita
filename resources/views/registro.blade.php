<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card{
            margin-top: 5%;
        }
        body{
            margin-top: 1%;
        }
    </style>
</head>
<body class="teal lighten-2">
    <div class="container">
        <div class="row">
            <div class="col s12 card">
                <div class="card-content">
                    <div class="col s4 center-align">
                        <br>
                        <br>
                        <br>
                        <img src="{{ asset('img/login_icon.png') }}" alt="" width="200" height="200">
                    </div>
                    <div class="col s8">
                        <div class="row">
                            <form action="{{ route('registro') }}" method="post" class="col s12">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" name="nombre" id="nombre" 
                                        class="validate @error('nombre') is-invalid @enderror">
                                        <label for="nombre" class="active">Nombre</label>

                                        @error('nombre')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" name="apellidos" id="apellidos" 
                                        class="validate @error('apellidos') is-invalid @enderror">
                                        <label for="apellidos" class="active">Apellidos</label>

                                        @error('apellidos')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" name="Ncontrol" id="Ncontrol" 
                                        class="validate @error('Ncontrol') is-invalid @enderror">
                                        <label for="Ncontrol" class="active">Numero Control</label>

                                        @error('Ncontrol')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="password" name="password" id="password" 
                                        class="validate @error('password') is-invalid @enderror">
                                        <label for="password">Password</label>

                                        @error('password')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="password" name="confirmarPassword" id="confirmarPassword" 
                                        class="validate @error('confirmarPassword') is-invalid @enderror">
                                        <label for="confirmarPassword">Confirmar Password</label>

                                        @error('confirmarPassword')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if(session('errorPassword'))
                                    <div class="card-panel red darken-4 center-align">{{ Session::get('errorPassword') }}</div>
                                @endif

                                @if(session('existe'))
                                    <div class="card-panel red darken-4 center-align">{{ Session::get('existe') }}</div>
                                @endif
                                <div class="row">
                                    <div class="col s6">
                                        <button type="submit" class="waves-effect waves-light btn">
                                            <i class="material-icons left">how_to_reg</i>
                                            Registrarme
                                        </button>
                                    </div>

                                    <div class="col s6 right-align">
                                        <a href="{{ route('singin') }}" class="btn">
                                            <i class="material-icons left">person_outline</i>
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('bien'))
        <div class="container">
            <div class="card-panel ">
                <h6>{{ Session::get('bien') }} <a href="{{ route('singin') }}">Ir a Login</a></h6>
            </div>
        </div>
        @endif

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/agency.js') }}"></script>
</body>
</html>