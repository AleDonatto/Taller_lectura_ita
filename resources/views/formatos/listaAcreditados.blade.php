<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Alumnos Acreditados</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <style>
        .fecha{
            padding-left: 70%;
        }
        .container{
            width: 95%;
        }
        .jefes{
            margin-top: 12%;
            margin-right: 50%;
            text-transform: uppercase;
        }
        .texto{
            margin-top: 23%;
        }
        table{
            margin-top: 33%;
            text-align: center;
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
        th{
            font-size: 8pt;
        }
        tbody > tr > td{
            font-size: 9pt;
        }
        .atte{
            text-transform: uppercase;   
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s6"></div>
            <div class="col s6 fecha">
                <p>Acapulco Guerrero @php echo  date('d')."/".date('m')."/".date('Y')  @endphp <br> 
                Dependecia: SUB. Planeacion y Vinculacion <br>
                Seccion: Centro de Informacion <br>
                Oficion No: ci-083/2020 <br>
                Asunto: Lista de Taller de Lectura </p>
            </div>
        </div>

        <div class="row">
            <div class="col s6 jefes">
                <p> <strong> Javier Sanchez Padilla </strong> <br>
                <strong> Jefe del Departamento de servicios escolares </strong> <br>
                <strong> P r e s e n t e</strong>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col texto">
                <p>Por este conducto, me permito entrear las constancias de la actividad complementaria
                Taller de Lectura llevada a cabo en el Centro de Informacion, correspondiente al Periodo
                (( periodo )), de los alumnos que se enlistan a continuacion. </p>
            </div>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. de Control</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Semestre</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($acreditados as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->Ncontrol  }}</td>
                        <td>{{ $item->Apellidos.' '.$item->Nombre }}</td>
                        <td>{{ $item->Carrera }}</td>
                        <td>{{ $item->Semestre }}</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>

            <div class="firmas">
                <p>Sin otro particualr, aprovecho la ocasion para enviarle a usted un cordial saludo.</p>

                <div class="atte">
                    <p> <strong>A t e n t a m e n t e</strong> <br>
                    "Educacion Tecnologica con Compromiso" <br><br><br><br>
                    <strong>Amin Bahena Salgado <br>
                    jefe del centro de informacion</strong></p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>