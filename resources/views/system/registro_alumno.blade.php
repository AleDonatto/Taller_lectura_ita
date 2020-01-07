@extends('menu')
@include('system.button')
<main class="col s9 hide" id="main">
    <div class="container">
        <form action="{{ route('inscripcion') }}" class="col s12" method="POST">
            @csrf 
            <div class="row">
                @foreach($taller as $item)
                    <div class="card-panel">
                        <span class="blue-text text-darken-2">Taller de Lectura</span> <br>
                        <span class="blue-text text-darken-2">Profesor: {{ $item->Nombre.' '.$item->Apellidos }}</span>

                        <p class="grey-text text-darken-3">
                            Horario: {{ $item->HoraInicio.' a '. $item->HoraFin.' '.'Dia: '.$item->Dia }}
                        </p>

                        <p class="grey-text text-darken-3">Numero de Alumnos: {{ $item->NAlumnos }}</p>
                        <p><label for="taller">
                            <input type="checkbox" name="taller" id="taller" value="{{ $item->idTaller }}">
                            <span>Inscribete</span>
                        </label></p>
                    </div>
                @endforeach()
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" name="ncontrol" id="ncontrol" value="{{ session('identificador') }}"
                    class="validate @error('ncontrol') is-invaid @enderror">
                    <label for="ncontrol" class="active">Numero Control</label>

                    @error('ncontrol')
                        <span class="heper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="text" name="nombre" id="nombre" value="{{ session('nombre') }}"
                    class="validate @error('nombre') is-invalid @enderror">
                    <label for="nombre" class="active">Nombre</label>

                    @error('nombre')
                    <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="text" name="apellidos" id="apellidos" value="{{ session('apellidos') }}"
                    class="validate @error('apellidos') is-invalid @enderror">
                    <label for="apellidos">Apellidos</label>

                    @error('apellidos')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="carrera" id="carrera" class="@error('carrera') is-invalid @enderror">    
                        <option value="" disabled selected>Carrera</option>
                        <option value="ISC">ISC</option>
                        <option value="LA">LA</option>
                        <option value="CP">CP</option>
                        <option value="IGE">IGE</option>
                        <option value="IEM">IEM</option>
                        <option value="IBQ">IBQ</option>
                    </select>
                    <label for="carrera">Seleccione Carrera</label>

                    @error('carrera')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <select name="semestre" id="semestre" class="@error('semestre') is-invalid @enderror">
                        <option value="" disabled selected>Semestre</option>
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
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                    <label for="semestre">Seleccione Semestre</label>
                    @error('semeste')
                        <span class="helper-text red-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @if(session('inscrito') )
                <div class="card-panel red lighten-1 center-align">
                    <i class="material-icons left">error_outline</i>
                    {{ Session::get('inscrito') }}
                </div>
            @endif

            @if(session('grupolleno'))
                <div class="card-panel light-blue lighten-4 center-align">
                    <i class="material-icons left">warning</i>
                    {{ Session::get('grupolleno') }}
                </div>
            @endif
            <div class="row">
                <button type="submit" class="waves-effect waves-light btn-small">
                    <i class="material-icons left">done</i>
                    Registrar
                </button>
            </div>
        </form>
    </div>
</main>