@extends('menu')
@include('system.button')

<main class="col s9 hide" id= main>
    <div class="container">
        <blockquote><h5>Evaluacion de Desempeño de las Actividades Complementarias</h5></blockquote>

        @isset($taller)
            <blockquote>Talleres</blockquote>
            <table class="striped highlight display nowrap" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Actividad</th>
                        <th>Periodo</th>
                        <th>Año</th>
                        <th>Docente</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taller as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ __('Taller de Lectura') }}</td>
                            <td>{{ $item->Periodo }}</td>
                            <td>{{ $item->Made_year }}</td>
                            <td>{{ $item->Nombre.' '.$item->Apellidos }}</td>
                            <td>
                                <a href="{{ route('viewalumnos',$item->idTaller) }}" class="btn tooltipped btn-floating waves-effect waves-light"
                                data-tooltip="Ver Alumnos">
                                    <i class="material-icons">format_list_bulleted</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        @endisset

        @isset($alumnos)
            <blockquote>Alumnos del Taller </blockquote>
            <table class="striped highlight display nowrap" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>N. Control</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Ncontrol }}</td>
                            <td>{{ $item->Apellidos.' '.$item->Nombre }}</td>
                            <td>{{ $item->Carrera }}</td>
                            <td>{{ $item->Semestre }}</td>
                            <td>
                                <a href="{{ route('constDesemp',$item->Ncontrol) }}" class="btn tooltipped btn-floating waves-effect waves-light"
                                data-tooltip="Ver Constancias" target="_blank" rel="noopener noreferrer">
                                    <i class="material-icons">class</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        @endisset 
    </div>
</main>