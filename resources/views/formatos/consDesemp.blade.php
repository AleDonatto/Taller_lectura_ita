<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <style>
        .center-align{
            text-align: center;
        }
        .center-align > h5{
            text-transform: uppercase;
        }
        .center-align > p {
            margin-top: 0px !important;
            padding: 0px !important;
        }
        .datos{
            width: 100%;
        }
        .datos > div{
            display: inline-block;
        }
        .datos > .label{
            width: 40%;
        }
        .datos > .information {
            width: 60%;
        }
        table{
            border: black 1px solid;
            margin-top: -9%;
        }
        table > thead > tr > th{
            border: black 1px solid;
            margin: 0px;
            padding: 0px;
            text-align: center;
        }
        table > tbody > tr > td{
            border: black 1px solid;
            margin: 0px;
            padding: 0px;
            text-align: center;
        }
        table > tfoot > tr > td > p {
            font-size: 8pt !important;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="center-align">
            <h6>Evaluacion al Desempeño de la Actividad Complementaria</h6>
            <h6>Subdireccion Academica</h6>
            <p>Departamneto de CENTRO DE INFORMACION </p>
        </div>
        <br>
        <div class="datos">
            <div class="label">
                <p>Nombre del Estudiante <br> Actividad Complementaria <br> Periodo de Realizacion</p>
            </div>
            <div class="information">
                <p>{{ $apellidos.' '.$nombre.' Numero de Control '.$ncontrol.' '.$carrera }} <br>
                TALLER DE FOMENTO A LA LECTURA <br>
                {{ $periodo.' '.$year }} </p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Criterio A Evaluar</th>
                    <th>Insuficiente</th>
                    <th>Suficiente</th>
                    <th>Bueno</th>
                    <th>Notable</th>
                    <th>Excelente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cumple en tiempo y forma las actividades encomendades alcanzando los objetivos</td>
                    @if( $c1=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c1=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c1=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c1=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c1=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>2</td>
                    <td>Trabaja en equipo y se adapata a nuevas situaciones</td>
                    @if( $c2=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c2=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c2=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c2=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c2=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>3</td>
                    <td>Muestra liderazgo en las actividades encomendadas</td>
                    @if( $c3=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c3=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c3=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c3=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c3=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>4</td>
                    <td>Organiza su tiempo y trabaja de manera proactiva</td>
                    @if( $c4=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c4=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c4=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c4=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c4=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>5</td>
                    <td>Interpreta la realidad y se sensibiliza aportando soluciones a la problematica
                    con la actividad Complementaria</td>
                    @if( $c5=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c5=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c5=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c5=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c5=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>6</td>
                    <td>Realiza sujerencias innovadoras para beneficio o mejora del programa en el 
                    que participa</td>
                    @if( $c6=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c6=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c6=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c6=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c6=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
                <tr>
                    <td>7</td>
                    <td>Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu 
                    se servicio</td>
                    @if( $c7=='Insuficiente' )
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c7=='Sificiente')
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @elseif($c7=='Bueno')
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    <td></td>
                    @elseif($c7=='Notable')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    <td></td>
                    @elseif($c7=='Excelente')
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <img src="{{ asset('img/x.png') }}" alt="" width="20" heigt="20"> </td>
                    @endif
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td>Observaciones:  <br> <p> Valor Numerico de la Actividad Complementaria</p>
                    <p>Nivel de desempeño alcanzado en la actividad Complementaria</p> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</body>
</html>