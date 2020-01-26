@extends('menu')
@include('system.button')

<main class="hide col s9" id="main">
    <div class="container">
        <blockquote><h4>Crear Nuevas Tarea</h4></blockquote>
        <form action="{{ route('tareas.store') }}" method="post" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <select name="taller" id="taller" class="@error('taller') is-invalid @enderror">
                        <option value="" disabled selected>Seleccion Taller</option>
                        @foreach($taller as $item)
                        <option value="{{ $item->idTaller }}">{{ $item->Periodo.' '.$item->Made_year }}</option>
                        @endforeach()
                    </select>
                    <label for="taller">Taller</label>

                    @error('taller')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="titulo" id="titulo" class="validate @error('titulo') is-invalid @enderror">
                    <label for="titulo" class="active">Titulo de la Tarea</label>

                    @error('titulo')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="date" name="fecha" id="fecha" class="validate @error('fecha') is-invalid @enderror">
                    <label for="date" class="active">Fecha Limite de Entrega</label>

                    @error('fecha')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="descripcion" id="descripcion" cols="30" rows="30" class="materialize-textarea @error('descripcion') is-invalid @enderror"></textarea>
                    <label for="descripcion" class="active">Describa la Tarea</label>

                    @error('descripcion')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn waves-effect waves-light">
                    <i class="material-icons left">class</i>
                    Crear Tarea
                </button>
            </div>
        </form>
    </div>
</main>