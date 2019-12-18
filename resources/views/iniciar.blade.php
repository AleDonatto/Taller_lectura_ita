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
            margin-top: 0.5%;
        }
        img{
            margin-top: 1%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="row center-align">
                        <img src="{{ asset('img/login_icon.png') }}" alt="" class="responsive-img" width="120" height="120">
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <form action="" method="post" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="" id="username" class="validate" placeholder="User Name">
                                        <label for="username" class="active">User Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" name="" id="password" class="validate" placeholder="Password">
                                        <label for="password" class="active">Password</label>
                                    </div>
                                </div>
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
                                <a href=""><h6 class="left-align blue-text">Olvido contraseña pendejo</h6></a>                    
                            </div>
                            <div class="col s6">
                                <a href="" class=""><h6 class="right-align blue-text">Registrarme</h6></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/mterialize.min.js') }}"></script>
</body>
</html>