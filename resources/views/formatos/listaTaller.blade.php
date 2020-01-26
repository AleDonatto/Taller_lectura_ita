<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Taller de Lectura</title>
    <!--<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">-->
    <style>
    th{
        font-size: 8pt;
    }
    tbody > tr > td{
        font-size: 9pt;
    }
    table{
        width: 100%;
        border: black 1px solid;
        border-collapse: collapse;
        text-align: center;
    }
    table > thead > tr > th{
        border: black 1px solid;
    }
    table > tbody > tr > td{
        border: black 1px solid;
    }
    .contenedor{
        width: 100%;
    }
    .cont1, .cont2{
        width: 50%;
        text-align: center;
    }
    .cont2{
        margin-left: 50%;
        margin-top: -15%;
    }
    .contenedor{
        margin: 15px;
        padding: 5px;
    }
    </style>
</head>
<body>
    <div class="header">
        <div class="contenedor">
            <div class="cont1">
                <p>Centro del Informacion</p>
                <p>Taller de Fomento a la Lectura</p> 
                <p>Periodo: {{ $periodo.' '.$periodoAnio}}</p>
            </div>
            <div class="cont2">
                <p>PROFESOR(A): {{ $nombre.' '.$apellidos}} </p>
                <p>Horario: {{ $dia.' '.$inicio.' a '.$fin }} Sala Audiovisual</p>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>CARRERA</th>
                <th>SEM</th>
                <th>No. CONTROL</th>
                <th>NOMBRE</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>05</th>
                <th>06</th>
                <th>07</th>
                <th>08</th>
                <th>09</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lista as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Carrera }}</td>
                <td>{{ $item->Semestre }}</td>
                <td>{{ $item->NControl }}</td>
                <td>{{ $item->Apellidos.' '.$item->Nombre}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>        
            @endforeach()
        </tbody>
    </table>

    <!--<script src="{{ asset('js/materialize.min.js') }}"></script>-->
</body>
</html>