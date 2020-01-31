@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Consulta Todos los Alumnos</h4></blockquote>
        <table class="striped highlight display" cellspacing="0" id="myTable" width="100%">
            <thead width="100%">
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
                        <a href="{{ route('alumnos.edit',$item->Ncontrol) }}" class="btn-floating btn-small waves-effect waves-light blue btn">
                            <i class="material-icons">edit</i>
                        </a>
                        <button data-target="modal1" class="eliminaralumno btn-floating waves-effect waves-light red btn-small modal-trigger"
                        data-ncontrol="{{ $item->Ncontrol }}" data-position="bottom">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        
    </div>
</main>

<div id="modal1" class="modal">
    <form action="{{ route('alumnos.destroy','id') }}" method="post">
        @csrf 
        @method('delete')
        <div class="modal-content">
            <h4>Eliminar Datos</h4>
            <p>¿Desea eliminar el dato permanentemente?</p>
            <input type="hidden" name="ncontrol" id="ncontrol">
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Eliminar</button>
        </div>
    </form>
</div>