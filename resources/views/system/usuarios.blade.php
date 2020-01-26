@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Crear nuevo Usuario Administrador</h4></blockquote>
        <form action="{{ route('usuarios.store') }}" method="post" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="nombreuser" id="nombreuser" 
                    class="validate @error('nombreuser') is-invalid @enderror">
                    <label for="nombreuser" class="active">Nombre: </label>

                    @error('nombreuser')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input type="text" name="apellidosuser" id="apellidosuser" 
                    class="validate @error('apellidosuser') is-invalid @enderror">
                    <label for="apellidosuser" class="active">Apellidos: </label>

                    @error('apellidosuser')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" name="nickuser" id="nickuser" 
                    class="validate @error('nickuser') is-invalid @enderror">
                    <label for="nickuser" class="active">Nick: </label>

                    @error('nickuser')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="password" name="passworduser" id="passworduser" 
                    class="validate @error('passworduser') is-invalid @enderror">
                    <label for="passworduser" class="active">Password: </label>

                    @error('passworduser')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="email" name="correouser" id="correouser" 
                    class="validate @error('correouser') is-invalid @enderror">
                    <label for="correouser" class="active">Correo: </label>

                    @error('correouser')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <button type="submit" class="waves-effect waves-light btn-small"><i class="material-icons left">done</i>Agregar</button>
                </div>
            </div>
        </form>
        <div class="divider"></div><br>
        <blockquote><h4>Lista de Usuarios</h4></blockquote>
        <table class="striped highlight" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Nick</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->Nombre }}</td>
                        <td>{{ $item->Apellidos }}</td>
                        <td>{{ $item->Nick }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->TipoUsuario }}</td>
                        <td>
                            <button data-target="modalEditUsuario" type="button" class="editUser btn-floating btn-small waves-effect waves-light blue btn modal-trigger tooltipped"
                            data-position="bottom" data-tooltip="Editar" data-iduser="{{ $item->id }}" data-nombreuser="{{$item->Nombre}}"
                            data-apellidosuser="{{ $item->Apellidos}}" data-nick="{{ $item->Nick}}" data-correo="{{$item->email}}">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" data-target="modalDeleteUsuario" class="deleteUser btn-floating waves-effect waves-light red btn-small btn modal-trigger tooltipped"
                            data-position="bottom" data-tooltip="Eliminar" data-iduser="{{$item->id}}">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
                @endforeach()
            </tbody>
        </table>
        <br><br>
    </div>
</main>

<div id="modalEditUsuario" class="modal">
    <form action="{{ route('usuarios.update','id') }}" method="post" class=" col s12">
        @csrf
        @method('PUT')
        <h4 class="center-align">Editar Datos Usuario</h4>
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" name="id" id="idUser" class="validate" disabled>
                    <input type="hidden" name="idUser" id="idUser">
                    <!--<label for="id" class="active">id Docente: </label>-->
                </div>
                <div class="input-field col s4">
                    <input type="text" id="nombreEdit" name="nombreEdit" class="validate">
                    <label for="nombreEdit" class="active">Nombre: </label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="apellidosEdit" id="apellidosEdit" class="validate">
                    <label for="apellidosEdit" class="active">Apellidos: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input type="email" name="correoEdit" id="correoEdit" class="validate">
                    <label for="correoEdit" class="active">Correo: </label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="nick" id="nick" class="validate">
                    <label for="nick" class="active">Nick: </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-small">
                <i class="material-icons left">check</i>
                Guardar Datos
            </button>
        </div>
    </form>
</div>

<div class="modal" id="modalDeleteUsuario">
    <form action="{{ route('usuarios.destroy','id') }}" method="post" class="col s12">
        @csrf
        @method('DELETE')
        <h4 class="center-align">Eliminar</h4>
        <div class="modal-content">
            <p>¿ Desea Eliminar el Usuario ?</p>
            <input type="hidden" name="idUser" id="idUser">
        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-small">
                <i class="material-icons right">check</i>
                Eliminar
            </button>
        </div>
    </form>
</div>