@extends('menu')
@include('system.button')

<main class="col hide s9" id="main">
    <div class="container">
        @isset($taller)
            <blockquote><h4>Seleccione Taller para ver las Tareas</h4></blockquote>
            <table class="striped highlight display nowrap" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Periodo</th>
                        <th>Año</th>
                        <th>N. Alumnos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taller as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Periodo }}</td>
                            <td>{{ $item->Made_year }}</td>
                            <td>{{ $item->NAlumnos }}</td>
                            <td>
                                <a href="{{ route('getTareas',$item->idTaller ) }}" class="btn tooltipped waves-effect waves-light btn-small" data-tooltip="Ver Tareas">
                                    <i class="material-icons">list_alt</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        @endisset

        @isset($alumnos)
            <blockquote><h4>Tareas Subidas por alumnos del taller</h4></blockquote>
            <table class="striped highlight display nowrap" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>N. Control</th>
                        <th>Nombre</th>
                        <th>Tarea</th>
                        <th>Fecha de Envio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Ncontrol }}</td>
                            <td>{{ $item->Apellidos.' '.$item->Nombre }}</td>
                            <td>{{ $item->Titulo }}</td>
                            <td>{{ $item->hora }}</td>
                            <td>
                                <form action="{{ route('download') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ruta" value="{{ $item->archivo }}">
                                    <button type="submit" target="_blank" rel="noopener noreferrer" class="btn tooltipped waves-effect waves-light btn-small" data-tooltip="Ver documento">
                                        <i class="material-icons">archive</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        @endisset
    </div>
</main>