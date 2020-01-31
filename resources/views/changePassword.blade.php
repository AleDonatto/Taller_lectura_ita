<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperacion de Contraseña</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card{
            margin-top: 12%;
        }
    </style>
</head>
<body class="teal lighten-2">
    <div class="container center-align">
        <div class="row card">
            <div class="col s3 center-align">
                <br> <br> <br><br>
                <i class="material-icons large">lock</i>
            </div>
            <div class="col s9">
                <form action="{{ route('cambioPassword') }}" method="post">
                    @csrf 
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombre" id="nombre" class="validate @error('nombre') is-invalid @enderror">
                            <label for="nombre" class="active">Nombre</label>

                            @error('nombre')
                                <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="apellidos" id="apellidos" class="validate @error('apellidos') is-invalid @enderror">
                            <label for="apellidos" class="active">Apellidos</label>

                            @error('apellidos')
                                <span class="helper-text red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" name="password" id="password" class="validate @error('password') is-invalid @enderror">
                            <label for="password" class="active">Nuevo Password</label>

                            @error('password')
                                <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" name="cpassword" id="cpassword" class="validate @error('cpassword') is-invalid @enderror">
                            <label for="cpassword" class="active">Confirmar Password</label>

                            @error('cpassword')
                                <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <button type="submit" class="btn waves-effect waves-light">
                                <i class="material-icons right">send</i>
                                Cambiar Password
                            </button>
                        </div>
                        <div class="col s6">
                            <a href="{{ route('singin') }}" class="btn waves-effect waves-light">
                                <i class="material-icons right">account_circle</i>
                                Login
                            </a>
                        </div>
                    </div>
                </form>
                @if(session('diferente'))
                    <div class="card red lighten-1 center-align">{{ Session::get('diferente') }}</div>
                @endif

                @if(session('cambio'))
                    <div class="card green accent-2 center-align">{{ Session::get('cambio') }}</div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>