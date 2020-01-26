@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Consulta Todos los Alumnos</h4></blockquote>
        <table class="striped highlight responsive-table centered" cellspacing="0" id="myTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N. Control</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->Ncontrol }}</td>
                    <td>{{ $item->Nombre }}</td>
                    <td>{{ $item->Apellidos }}</td>
                    <td>{{ $item->Carrera }}</td>
                    <td>{{ $item->Semestre }}</td>
                    <td>
                        <a href="" class="btn-floating btn-small waves-effect waves-light blue btn">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="" class="btn-floating waves-effect waves-light red btn-small btn">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        
    </div>
</main>