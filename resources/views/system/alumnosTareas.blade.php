@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        <blockquote><h4>Tarea del Taller</h4></blockquote>
        <div class="card-panel">
            @foreach($tareas as $item)
            <div class="card-panel">
                <div class="row">
                    <div class="col s2">
                        <i class="material-icons large">book</i>
                    </div>
                    <div class="col s10">
                        <h5>Titulo: {{ $item->Titulo }}</h5>
                        <div class="divider"></div>
                        <h6>Descripcion de Tarea <br> {{ $item->Descripcion }}</h6>
                        <div class="divider"></div>
                        <h6>Fecha de Entrega: {{ $item->FechaEntrega }}</h6>
                        <div class="divider"></div>

                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="file-field input-field">
                                <input type="hidden" name="ncontrol" value="{{ session('identificador') }}">
                                <input type="hidden" name="tarea" value="{{ $item->id }}">
                                <input type="hidden" name="fechaentrega" value="{{ $item->FechaEntrega }}">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="archivo" id="archivo">
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" name="ruta" id="ruta" class="file-path validate">
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn waves-effect waves-light">
                                    <i class="material-icons right">send</i>
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
</main>