@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Editar Datos Alumno</h4></blockquote>
        @foreach($alumno as $item)
            <form action="{{ route('alumnos.update',$item->Ncontrol ) }}" method="post" class="card-panel">
                @csrf 
                @method('put')
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="ncontrol" id="ncontrol" class="validate"
                        value="{{ $item->Ncontrol }}" disabled>
                        <label for="ncontrol" class="active">N. Control</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="nombre" id="nombre" class="validate @error('nombre') is-invalid @enderror"
                        value="{{ $item->Nombre }}">
                        <label for="nombre" class="active">Nombre </label>

                        @error('nombre')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="apellidos" id="apellidos" class="validate @error('apellidos') is-invalid @enderror"
                        value="{{ $item->Apellidos }}">
                        <label for="apellidos" class="active">Apellidos</label>

                        @error('apellidos')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 input-field">
                        <select name="carrera" id="carrera">
                            <option value="{{ $item->Carrera }}" selected>{{ $item->Carrera }}</option>
                            <option value="ISC">ISC</option>
                            <option value="LA">LA</option>
                            <option value="CP">CP</option>
                            <option value="IGE">IGE</option>
                            <option value="IEM">IEM</option>
                            <option value="IBQ">IBQ</option>
                        </select>
                        <label for="carrera" >Carrera</label>

                        @error('carrera')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <select name="semestre" id="semestre">
                            <option value="{{ $item->Semestre }}" selected>{{ $item->Semestre }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>

                    @error('semestre')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <button type="submit" class="btn waves-effect waves-light">
                        <i class="material-icons left">edit</i>
                        Modificar
                    </button>
                </div>
            </form>
        @endforeach()
    </div>
</main>