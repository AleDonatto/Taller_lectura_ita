@extends('main')

@empty(session('nombre'))
    return view('welcome');
@endempty


@section('admin')
@parent
<header class="hide" id="contenido">
    <!--<div class="container">
        <a id="boton" data-target="nav-mobile" class="top-nav sidenav-trigger btn-large" onclick="abrir()"><i class="material-icons">menu</i></a>
    </div>-->
    <ul id="nav-mobile" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="{{ asset('img/libros-B.jpg') }}" alt="">
                </div>
                <i class="Medium circle material-icons">person_outline</i>
                <!--<a ><img src="" alt="" class="circle"></a>-->
                <a ><span class="white-text name">{{ session('nombre') }}</span></a>
                <a ><span class="white-text email">{{ session('correo') }}</span></a>
            </div>
        </li>
        <li>
            <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i> {{ __('Cerrar Session') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li>
            <a class="subheader">{{ __('Opciones') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('profileAdmin') }}" class="waves-effect">{{ __('Home') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('docente.index') }}" class="waves-effect">{{ __('Docentes') }}</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect" style="padding: 0 32px;">{{ __('Talleres') }}</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('taller.index') }}" style="padding: 0 45px;">Configuracion Talleres</a></li>
                            <li><a href="{{ route('listTalleres') }}" style="padding: 0 45px;">Lista de Talleres</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect" style="padding: 0 32px;">{{ __('Alumnos') }}</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('alumnos.index') }}" style="padding: 0 45px;">Todos los Alumnos</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect" style="padding: 0 32px;">{{ __('Constancias') }}</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('consCumplimiento') }}" style="padding: 0 45px;">Cum. de Act. Complem.</a></li>
                            <li><a href="" style="padding: 0 45px;">Des. de las Act. Complem.</a></li>
                            <li><a href="{{ route('talleresacreditados') }}" style="padding: 0 45px;">Lista de Alumnos Acreditados</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="bold">
            <a href="{{ route('usuarios.index') }}" class="waves-effect">{{ __('Usuarios') }}</a>
        </li>
    </ul>
</header>
@endsection

@section('Alumno')
<header class="hide" id="contenido">
    <!--<div class="container">
        <a id="boton" data-target="nav-mobile" class="top-nav sidenav-trigger btn-large" onclick="abrir()"><i class="material-icons">menu</i></a>
    </div>-->
    <ul id="nav-mobile" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="{{ asset('img/libros-B.jpg') }}" alt="">
                </div>
                <i class="Medium circle material-icons">person_outline</i>
                <a ><span class="white-text name">{{ session('nombre') }}</span></a>
                <a ><span class="white-text email">{{ session('correo') }}</span></a>
            </div>
        </li>
        <li>
            <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i> {{ __('Cerrar Session') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li>
            <a class="subheader">{{ __('Opciones') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('profileStudent') }}" class="waves effect">{{ __('Home') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('preregistro') }}" class="waves-effect">{{ __('Registro') }}</a>
        </li>
        <li class="bold">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect" style="padding: 0 32px;">{{ __('Talleres') }}</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('profileStudent') }}" style="padding: 0 45px;">{{ __('Mis Talleres') }}</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</header>
@endsection

@section('Docente')
<header class="hide" id="contenido">
    <!--<div class="container">
        <a id="boton" data-target="nav-mobile" class="top-nav sidenav-trigger btn-large" onclick="abrir()"><i class="material-icons">menu</i></a>
    </div>-->
    <ul id="nav-mobile" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="{{ asset('img/libros-B.jpg') }}" alt="">
                </div>
                <i class="Medium circle material-icons">person_outline</i>
                <a ><span class="white-text name">{{ session('nombre') }}</span></a>
                <a ><span class="white-text email">{{ session('correo') }}</span></a>
            </div>
        </li>
        <li>
            <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i> {{ __('Cerrar Session') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li>
            <a class="subheader">{{ __('Opciones') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('profileTeacher') }}" class="waves-effect">{{ __('Home') }}</a>
        </li>
        <li class="bold">
            <a href="{{ route('listaDocente') }}" class="waves-effect">{{ __('Lista de Taller') }}</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect" style="padding: 0 32px;">{{ __('Tareas') }}</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('formtareas') }}" style="padding: 0 45px;">{{ __('Nueva Tarea') }}</a></li>
                            <li><a href="{{ route('listaTareas') }}" style="padding: 0 45px;">{{ __('Config. Tareas') }}</a></li>
                            <li><a href="{{ route('listasTareasAlumnos') }}" style="padding: 0 45px;">{{ __('Tareas Recibidas') }}</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="bold">
            <a href="{{ route('calificaiones') }}" class="waves-effect">{{ __('Calificaciones') }}</a>
        </li>
    </ul>
</header>
@endsection
