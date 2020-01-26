<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Alumnos Acreditados</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <style>
        .titulo{
            text-transform: uppercase;
            text-align: center;
            margin-top: 5%;
            font-size: 12px;
            font-weight: bold !important;
        }
        .container{
            width: 95%;
        }
        .jefes{
            margin-top: 10%;
            margin-right: 50%;
            text-transform: uppercase;
            font-weight: bold !important;
        }
        .texto{
            margin-top: 23%;
            text-align: justify;
        }
        .firmas{
            margin-top: 5%;
            text-transform: uppercase;
            text-align: center;   
        }
        .firmas > .atencion{
            font-weight: bold !important;
        }
        .palabras{
            font-size: 12pt;
        }
        .eslogan{
            margin: 0px !important;
            padding: 0px;
            font-style: italic;
            font-size: 9pt;
        }
        .sellos{
            margin-top: 10%;
        }
        .sellos > .docente, .departamento{
            width: 50%;
            text-transform: uppercase;
            font-weight: bold !important;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="titulo">
                <h6>constancia de cumplimiento de actividad complementaria</h6>
            </div>
        </div>

        <div class="row">
            <div class="col s6 jefes">
                <p> <strong>C. ing. Javier Sanchez Padilla </strong> <br>
                <strong> Jefe del Departamento de servicios escolares </strong> <br>
                <strong> P r e s e n t e</strong>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col texto">
                <p class="palabras">El que suscribe, AMIN BAHENA SALGADO, por este medio se permite hacer de su conociminto 
                que el (la) estudiante {{ $apellidos.' '.$nombre }} con numero de control {{ $control }} de 
                la carrera {{ $carrera }} ha cumplido su activiadad complementaria con el nivel de desempeño (EXCELENTE)
                y un valor numerico de 4.00 duarnte el perido escolar {{$periodo.' '.$year}} con un valor curricular de 1 credito </p>

                <p class="palabras">Se extiende la presente en la cuidad y puerto de Acapulco, Guerrero a los @php echo date('d') @endphp dias de 
                {{$mes}} del @php echo date('Y') @endphp </p>
            </div>

            <div class="firmas">
                <p class="atencion">a t e n t a m e n t e</p>
                <p class="eslogan">"Educacion Tecnologica con Compromiso Social"</p>
            </div>

            <div class="sellos">
                <div class="docente">
                    <p>{{$dNombre.' '.$dApellidos}}</p>
                    <p>Nombre y firma del profesor responsable</p>
                </div>
                <div class="departamento">
                    <p>Vo. Bo. Amin Bahena Salgado</p>
                    <p>Jefe del centro de informacion</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>