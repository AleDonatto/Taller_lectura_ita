@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Consulta de Tareas</h4></blockquote>
        <table class="striped highlight display nowrap" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>id Tarea</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>FechaEntrega</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->Titulo }}</td>
                    <td>{{ $item->Descripcion }}</td>
                    <td>{{ $item->FechaEntrega }}</td>
                    <td>
                        <button class="btn-floating waves-effect waves-light">Editar</button>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</main>