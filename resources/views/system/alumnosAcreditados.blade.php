@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        @isset($taller)
            <blockquote><h4>Alumnos Acreditados</h4></blockquote>

            <table class="striped highlight display nowrap" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Taller</th>
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
                        <td>{{ $item->Periodo}}</td>
                        <td>{{ $item->Made_year }}</td>
                        <td>{{ $item->Nombre.' '.$item->Apellidos }}</td>
                        <td>
                            <a href="{{ route('listaAcreditados',$item->idTaller) }}" target="_blank" rel="noopener noreferrer"
                            class="btn-floating waves-effect waves-light">
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