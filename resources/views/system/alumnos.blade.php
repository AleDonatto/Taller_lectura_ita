@extends('menu')
@include('system.boton')

<main class="col s9 hide" id="main">
    <div class="container">
        @if(session('registro') == 'no')
            <div class="card-panel green accent-2">This is a card panel with a teal lighten-2 class</div>
        @endif
        <h6 class="center-lign">Consulta de alumnos</h6>
    </div>
</main>