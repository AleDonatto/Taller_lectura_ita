@extends('menu')
@include('system.button')
<main class="col s9 hide" id="main">
    <div class="container">
        <form action="{{ route('docente.store') }}" method="post" class="col s12">
            @csrf
            <div class="row">
                <h6 class="center-align">Agregar Nuevo Docente</h6>
                <div class="input-field col s6">
                    <input type="text" name="nameDocente" id="nameDocente" 
                    class="validate @error('nameDocente') is-invalid @enderror">
                    <label for="nameDocente" class="active">Nombre: </label>

                    @error('nameDocente')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input type="text" name="apellidos" id="apellidos" 
                    class="validate @error('apellidos') is-invalid @enderror">
                    <label for="apellidos" class="active">Apellidos: </label>

                    @error('apellidos')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="nick" id="nick" class="validate @error('nick') is-invalid @enderror">
                    <label for="nick" class="active">Nick: </label>

                    @error('nick')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input type="password" name="password" id="password" class="validate @error('password') is-invalid @enderror">
                    <label for="password" class="active">Password: </label>

                    @error('password')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="email" name="correo" id="correo" class="validate @error('correo') is-invalid @enderror">
                    <label for="correo" class="active">Correo: </label>

                    @error('correo')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <button type="submit" class="waves-effect waves-light btn-small"><i class="material-icons left">done</i>Agregar</button>
                </div>
            </div>
        </form>

        <div class="divider"></div>
        <br>
        <br>
        <br>
        <h6 class="center-align">Consulta de Docentes</h6>

        <table class="striped highlight display nowrap" id="myTable" style="width:100%">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($docente as $item)
                <tr>
                    <td>{{ $item->idDocente}}</td>
                    <td>{{ $item->Nombre }}</td>
                    <td>{{ $item->Apellidos }}</td>
                    <td>
                        <button data-target="modalEditDocente" type="button" class="edit btn-floating btn-small waves-effect waves-light blue btn modal-trigger tooltipped"
                        data-nombre="{{ $item->Nombre }}" data-id="{{ $item->idDocente }}" data-apellidos="{{ $item->Apellidos}}"
                        data-position="bottom" data-tooltip="Editar">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" data-target="modalDeleteDocente" class="delete btn-floating waves-effect waves-light red btn-small btn modal-trigger tooltipped"
                        data-id="{{ $item->idDocente }}" data-position="bottom" data-tooltip="Eliminar">
                            <i class="material-icons">delete</i>
                        </button>
                    </th>
                </tr>
            @endforeach         
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
</main>

<div id="modalEditDocente" class="modal">
    <form action="{{ route('docente.update','id') }}" method="post" class="col s12">
        @csrf
        @method('PUT')
        <h4 class="center-align">Editar Datos Docente</h4>
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="id" id="idDocente" class="validate" disabled>
                    <!--<label for="id" class="active">id Docente: </label>-->
                </div>
                <div class="input-field col s6">
                    <input type="hidden" name="idDocente" id="idDocente">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="nombreEdit" name="nombreEdit" class="validate">
                    <label for="nombreEdit" class="active">Nombre: </label>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="apellidosEdit" id="apellidosEdit" class="validate">
                    <label for="apellidosEdit" class="active">Apellidos: </label>
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

<div class="modal" id="modalDeleteDocente">
    <form action="{{ route('docente.destroy','id') }}" method="post" class="col s12">
        @csrf
        @method('DELETE')
        <h4 class="center-align">Eliminar</h4>
        <div class="modal-content">
            <p>¿ Desea Eliminar los datos del Docente ?</p>
            <input type="hidden" name="idDocenteDelete" id="idDocenteDelete">
        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-small">
                <i class="material-icons right">check</i>
                Eliminar
            </button>
        </div>
    </form>
</div>

