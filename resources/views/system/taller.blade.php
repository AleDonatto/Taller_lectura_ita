@extends('menu')
@include('system.button')
<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Crear Nuevo Taller</h4></blockquote>
        <form action="{{ route('taller.store') }}" method="post" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s4">
                    <select name="docente" id="docente">
                        <option value="" disabled selected>Seleccione Docente</option>
                        @foreach($docente as $item)
                            <option value="{{ $item->idDocente }}">{{ $item->Nombre.' '.$item->Apellidos }}</option>
                        @endforeach()
                    </select>
                    <label for="docente" class="">Docente: </label>
                </div>
                <div class="input-field col s4">
                    <select name="periodo" id="perido">
                        <option value="" disabled selected>Seleccione Periodo</option>
                        <option value="Enero-Junio">Enero - Junio</option>
                        <option value="Agosto-Diciembre">Agosto - Diciembre</option>
                    </select>
                    <label>Periodo: </label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="year" id="year" class="validate @error('year') is-invalid @enderror">
                    <label for="year" class="active">Año: </label>

                    @error('year')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <select name="dia" id="dia">
                        <option value="" disabled selected>Seleccione dia</option>
                        <option value="lunes">Lunes</option>
                        <option value="martes">Martes</option>
                        <option value="miercoles">Miercoles</option>
                        <option value="jueves">Jueves</option>
                        <option value="viernes">Viernes</option>
                    </select>
                    <label for="dia" classs="active">Dia: </label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="horainicio" id="horainico" class="timepicker validate @error('horainicio') is-invalid @enderror">
                    <label for="horainicio" class="active">Hora Inicio</label>

                    @error('horainicio')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="text" name="horafin" id="horafin" class="timepicker validate @error('horafin') is-invalid @enderror">
                    <label for="horafin" class="active">Hora Fin</label>

                    @error('horafin')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" name="alumnos" id="alumnos" class="validate @error('alumnos') is-invalid @enderror">
                    <label for="alumnos" class="active">Numero de Alumnos para Taller</label>

                    @error('alumnos')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>    
            @if(session('errorTaller'))
                <div class="card-panel red darken-4 center-align">{{ Session::get('errorTaller') }}</div>
            @endif
            <div class="row">
                <button type="submit" class="waves-effect waves-light btn btn-small"><i class="material-icons left">add</i>Crear Taller</button>
            </div>
        </form>
        <br><br>
        <div class="divider"></div>
        <blockquote><h4>Lista de Talleres Creados</h4></blockquote>
        <table class="striped highlight display nowrap" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Docente</th>
                    <th>Periodo</th>
                    <th>Año</th>
                    <th>Hora Inicio</th>
                    <th>Hora fin</th>
                    <th>Dia</th>
                    <th># Alumnos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taller as $item)
                    <tr>
                        <td>{{ $item->idTaller }}</td>
                        <td>{{ $item->Profesor }}</td>
                        <td>{{ $item->Periodo }}</td>
                        <td>{{ $item->Made_year }}</td>
                        <td>{{ $item->HoraInicio }}</td>
                        <td>{{ $item->HoraFin }}</td>
                        <td>{{ $item->Dia }}</td>
                        <td>{{ $item->NAlumnos }}</td>
                        <td>
                            <button data-target="modalEditTaller" type="button" class="editTaller btn-floating btn-small waves-effect waves-light blue btn modal-trigger tooltipped"
                            data-position="bottom" data-tooltip="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" data-target="modalDeleteDocente" class="deleteTaller btn-floating waves-effect waves-light red btn-small btn modal-trigger tooltipped"
                            data-id="{{ $item->idTaller }}" data-position="bottom" data-tooltip="Eliminar">
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

<div class="modal" id="modalDeleteTaller">
    <form action="{{ route('taller.destroy','id') }}" method="post" class="col s12">
        @csrf
        @method('DELETE')
        <h4 class="center-align">Eliminar</h4>
        <div class="modal-content">
            <p>¿ Desea Eliminar los datos del Docente ?</p>
            <input type="hidden" name="idTallerDelete" id="idTallerDelete">
        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn-small">
                <i class="material-icons right">check</i>
                Eliminar
            </button>
        </div>
    </form>
</div>
