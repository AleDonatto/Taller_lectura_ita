<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card{
            margin-top: 1%;
        }
        img{
            margin-top: 1%;
        }
        body{
            margin-top: 1%;
        }
    </style>
</head>
<body class="teal lighten-2">
    <div class="container center-align">
        <div class="row">
            <div class="col s2"></div>
            <div class="col s8">
                <div class="card">
                    <div class="row center-align">
                        <img src="{{ asset('img/login_icon.png') }}" alt="" class="responsive-img" width="120" height="120">
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <form action="{{ route('main') }}" method="post" class="col s12">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="username" id="username" 
                                        class="validate @error('username') is-invalid @enderror">
                                        <label for="username" class="active">User Name</label>

                                        @error('username')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" name="password" id="password"
                                        class="validate @error('password') is-invalid @enderror">
                                        <label for="password" class="active">Password</label>

                                        @error('password')
                                            <span class="helper-text red-text" data-success="right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if(session('errorLogin'))
                                    <div class="card-panel red lighten-1 center-align">{{ Session::get('errorLogin') }}</div>

                                @endif
                                <div class="row center-align">
                                    <button type="submit" class="waves-effet waves-light btn-large">
                                        <i class="material-icons left">input</i>
                                        Ingresar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="col s6">
                                <a href=""><h6 class="left-align blue-text">Olvide contraseña</h6></a>                    
                            </div>
                            <div class="col s6">
                                <a href=" {{route('registrarse')}} "><h6 class="right-align blue-text">Registrarme</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s2"></div>
        </div>
    </div>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>