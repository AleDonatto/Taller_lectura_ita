@extends('menu')
@include('system.button')
<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4 class="">Lista de Talleres</h4></blockquote>
        <table class="striped highlight display nowrap" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Taller</th>
                    <th>Perido</th>
                    <th>Año</th>
                    <th>N. Alumnos</th>
                    <th>Docente</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taller as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->idTaller }}</td>
                    <td>{{ $item->Periodo }}</td>
                    <td>{{ $item->Made_year }}</td>
                    <td>{{ $item->NAlumnos }}</td>
                    <td>{{ $item->Nombre.' '.$item->Apellidos }}</td>
                    <td>
                        <!--<a href="{{ route('getListaTaller','$item->idTaller') }}" class="btn tooltipped waves-effect waves-light btn-small" data-tooltip="Ver Lista"><i class="material-icons">list_alt</i></a>-->
                        <a href="{{ route('getListaTaller',$item->idTaller) }}" target="_blank" rel="noopener noreferrer" class="btn tooltipped waves-effect waves-light btn-small" data-tooltip="Ver Lista">
                            <i class="material-icons">list_alt</i>
                        </a>
                    </td>
                </tr>
                
                @endforeach()
            </tbody>
        </table>
    </div>
</main>