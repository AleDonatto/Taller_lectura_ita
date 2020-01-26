@extends('menu')
@include('system.button')

<main class="col s9 hide" id="main">
    <div class="container">
        
        @isset($taller)
        <blockquote><h4>Seleccione Taller</h4></blockquote>
        <table class="striped highlight display nowrap" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Clave Taller</th>
                    <th>Periodo</th>
                    <th>Año</th>
                    <th>No. Alumnos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taller as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->idTaller }}</td>
                    <td>{{ $item->Periodo  }}</td>
                    <td>{{ $item->Made_year }}</td>
                    <td>{{ $item->NAlumnos }}</td>
                    <td>
                        <a href="{{ route('getAlumnosCalf',$item->idTaller) }}" class="btn tooltipped waves-effect waves-light btn-small" data-tooltip="Ver Lista">
                            <i class="material-icons">list_alt</i>
                        </a>
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        @endisset
        

        @isset($alumnos)

        <blockquote><h4>Criterios de Evaluacion</h4></blockquote>
        <div class="card-panel col s12">
            <div class="row">
                <div class="col s10">
                    <p>Criterios </p>
                    <p>1.- Cumple en tiempo y forma con las actividades encomendades alcanzando los objetivos <br>
                    2.- Trabaja en equipo y se adapta a nuevas situaciones <br>
                    3.- Muestra liderazgo en actiivdades encomendadas <br>
                    4.- Organiza su tiempo y trabaja de manera proactiva <br>
                    5.- Interpreta la realidad y se sensibiliza aportando soluciones a la problematica con las actividades complementarias <br>
                    6.- Realiza sugerencias inovadoras para beneficio y meora del programa en el que participa <br>
                    7.- Tiene Iniciativa para evaluar en las actividades encomendadas y muestra espiritu de serivicio <br>
                    </p>
                </div>
                <div class="col s2">
                    <p>Evaluacion</p>
                    <p>1.- Insuficiente <br>
                    2.- Suficiente <br>
                    3.- Bueno <br>
                    4.- Notable <br>
                    5.- Excelente</p>
                </div>
            </div>
        </div>
        @foreach($alumnos as $item)
        <form action="{{ route('calificacion') }}" method="post" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s1">
                    <input type="text" name="control" id="control" class="validate" value="{{ $item->NControl }}">
                    <label for="control" class="active">N. Control</label>
                    <input type="hidden" name="taller" class="validate" value="{{ $item->Taller }}">
                </div>
                <div class="input-field col s2">
                    <input type="text" name="nombre" id="nombre" class="validate" value="{{ $item->Apellidos.' '.$item->Nombre }}">
                    <label for="nombre" class="active">Nombre</label>
                </div>
                <div class="input-field col s1">
                    <select name="acredito" id="acredito">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="SI">Acreditado</option>
                        <option value="NA">NA</option>
                    </select>
                    <label for="acredito">Acredito</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio1" id="criterio2">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio1">Criterio 1</label>
                </div>
                <div class="col s1 input-field">
                    <select name="criterio2" id="criterio2">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio2">Criterio 2</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio3" id="criterio3">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio3">Criterio 3</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio4" id="criterio4">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio4">Criterio 4</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio5" id="criterio5">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio5">Criterio 5</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio6" id="criterio6">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio6">Criterio 6</label>
                </div>
                <div class="input-field col s1">
                    <select name="criterio7" id="criterio7">
                        <option value="" selected disabled>Seleccione</option>
                        <option value="Insuficiente">1</option>
                        <option value="Suficiente">2</option>
                        <option value="Bueno">3</option>
                        <option value="Notable">4</option>
                        <option value="Excelente">5</option>
                    </select>
                    <label for="criterio7">Criterio 7</label>
                </div>
                <!--<div class="input-field col s1">
                    <input type="text" name="criterio1" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 1</label>
                </div>-->
                <!--<div class="input-field col s1">
                    <input type="text" name="criterio2" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 2</label>
                </div>-->
                <!--<div class="input-field col s1">
                    <input type="text" name="criterio3" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 3</label>
                </div>-->
                <!--<div class="input-field col s1">
                    <input type="text" name="criterio4" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 4</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" name="criterio5" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 5</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" name="criterio6" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 6</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" name="criterio7" id="" class="validate autocomplete">
                    <label for="criterio1">Criterio 7</label>
                </div>-->
                <div class="input-field col s1">
                    <button type="submit" class="btn waves-effect waves-teal">
                        <i class="material-icons">save</i>
                    </button>
                </div>
            </div>
        </form>
        @endforeach()

        @endisset
    </div>
</main>
