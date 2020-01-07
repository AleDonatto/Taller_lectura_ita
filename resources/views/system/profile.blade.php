@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        @if(session('tipouser') == 'Alumno')
            @if(session('registro') == 'no')
                <div class="card-panel green accent-2"><h2>* Nota </h2> <br>
                    <blockquote><h6>Tu perfil aun no se a completado.</h6></blockquote>
                    <br>
                    <h6>Completalo en la seccion de registro.</h6>
                </div>
            @else
                <blockquote><h4>Mis Talleres</h4></blockquote>
                @foreach($taller as $item)
                    <div class="card-panel">
                        <span class="blue-text text-darken-2">Taller de Lectura</span> <br>
                        <span class="blue-text text-darken-2">Profesor: {{ $item->Nombre.' '.$item->Apellidos }}</span>

                        <p class="grey-text text-darken-3">
                            Horario: {{ $item->HoraInicio.' a '. $item->HoraFin.' '.'Dia: '.$item->Dia }}
                        </p>
                    </div>
                @endforeach()
            @endif
        @elseif(session('tipouser') == 'Docente')
            <blockquote><h4>Mis Talleres</h4></blockquote>
            <div class="card-panel">
                @foreach($taller as $item)
                    <div class="card-panel col s12">
                        <div class="row">
                            <div class="col s2">
                                <i class="large material-icons">menu_book</i>
                            </div>
                            <div class="col s5">
                                <span class="blue-text text-darken-2">Taller de Lectura</span><br>
                                <span class="blue-text text-darken-2">Docente: {{ $item->Nombre.' '.$item->Apellidos}}</span>

                                <p class="grey-text text-darken-3">
                                    Periodo: {{ $item->Periodo.' '.$item->made_year }}
                                </p>
                            </div>
                            <div class="col s5">
                                <p class="grey-text text-darken-3">
                                    Horario: {{ $item->Dia.' '.$item->HoraInicio.' a '.$item->HoraFin}}
                                </p>
                                <p class="grey-text text-darken-3">
                                    Total de Alumnos Permitidos: {{ $item->NAlumnos }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach()
            </div>
        @elseif(session('tipouser') == 'Administrador')
        <blockquote><h4>Talleres Creados</h4></blockquote>
        <div class="card-panel">
            @foreach($taller as $item)
                <div class="card-panel col s12">
                    <div class="row">
                        <div class="col s2">
                            <i class="large material-icons">menu_book</i>
                        </div>
                        <div class="col s5">
                            <span class="blue-text text-darken-2">Taller de Lectura</span><br>
                            <span class="blue-text text-darken-2">Docente: {{ $item->Nombre.' '.$item->Apellidos}}</span>

                            <p class="grey-text text-darken-3">
                                Periodo: {{ $item->Periodo.' '.$item->made_year }}
                            </p>
                        </div>
                        <div class="col s5">
                            <p class="grey-text text-darken-3">
                                Horario: {{ $item->Dia.' '.$item->HoraInicio.' a '.$item->HoraFin}}
                            </p>
                            <p class="grey-text text-darken-3">
                                Total de Alumnos Permitidos: {{ $item->NAlumnos }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach()
        </div>
        @endif
    </div>
</main>