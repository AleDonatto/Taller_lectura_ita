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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12 card">
                <div class="card-content">
                    <div class="col s4">
                        <!--<img src="{{ asset('img/tnm1.jpg') }}" alt="" width="300" height="300">-->
                        <p>Aqui va una imagen</p>
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
                                    <div class="input-field col s6">
                                        <select name="carrera" id="carrera">    
                                            <option value="ISC" disabled selected>ISC</option>
                                            <option value="LA">LA</option>
                                            <option value="CP">CP</option>
                                            <option value="IGE">IGE</option>
                                            <option value="IEM">IEM</option>
                                            <option value="IBQ">IBQ</option>
                                        </select>
                                        <label for="carrera">Seleccione Carrera</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="semestre" id="semestre">
                                            <option value="1" disabled selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                        <label for="semestre">Semestre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="email" name="correo" id="correo" 
                                        class="validate @error('correo') is-invalid @enderror">
                                        <label for="correo">E Mail</label>

                                        @error('correo')
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
                                @enderror
                                <div class="row left-align">
                                    <button type="submit" class="waves-effect waves-light btn">
                                        <i class="material-icons left">how_to_reg</i>
                                        Registrarme
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/agency.js') }}"></script>
</body>
</html>