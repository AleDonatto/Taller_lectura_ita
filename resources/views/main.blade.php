<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taller de Lectura</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/agency.css') }}">
    <style>
        #preloader{
            margin-top: 20%;
        }
        main > .container{
            margin-right: 3%;
        }
        #boton{
            margin-top: 0%;
            padding-top: 0%;
        }
    </style>
</head>
<body>
    <section id="preloader" class="center-align">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-green-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </section>

    @php
        $tipouser = session('tipouser');
    @endphp

    @if($tipouser == 'Administrador')
        @yield('admin')
    @elseif($tipouser == 'Docente')
        @yield('Docente')
    @elseif($tipouser == 'Alumno')
        @yield('Alumno')
    @endif


    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/agency.js') }}"></script>

    <script>
        window.addEventListener('load',() =>{
            setTimeout(carga,1000);

            function carga(){
                document.getElementById('preloader').className='hide';
                document.getElementById('contenido').className='animated fadeIn';
                document.getElementById('main').className='col s9 animated fadeIn';
                document.getElementById('boton').className="container animated fadeIn";
            }
        });
    </script>
    <script>
        @if(session('mensajeToast'))
            var toast = "{{ Session::get('mensajeToast') }}";
            M.toast({
                html: toast,
                displayLength: 6000
            })
        @endif
    </script>
</body>
</html>
