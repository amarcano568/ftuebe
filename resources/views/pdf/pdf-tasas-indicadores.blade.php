<html>

<head>
    <link href="{{ asset('css/bootstrap-3-simple.min.css') }}" rel="stylesheet" />
    <style>
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
        }

        header { position: fixed; 
        left: 0px; 
        top: -1em; 
        right: 0px; 
        height: 2em;
        text-align: center; }

        body {
            margin-top: 4.5em;
        }

        .otraPagina {
            page-break-before: always;
        }

        .otraPagina:last-child {
            page-break-before: never;
        }
       
        .page-number:before {
        content: "Pág: " counter(page);
        }

        .alto{
            height: 8px !important;
            color: brown
        }
        
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-xs-2">
                <img src="img/logo_vertical.png" alt="" width="100%">
            </div>
            <div class="col-xs-8 text-center">
                <h4><strong>FACULTAD DE TEOLOGÍA</strong></h4>             
            </div>
        </div>
    </header>
    
    <main>       
        <div class="row">
            <div class="col-sm-9">
                <table class="table table-striped">
                    <tbody>
                        <tr class="alto">
                            <th colspan="2"><strong>
                                    <h5 class="text-center text-info">INDICADORES PRINCIPALES PARA EL SISTEMA DE CALIDAD
                                    </h5>
                                </strong></th>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Tasa de Graduación</h6>
                            </td>
                            <td id="tasa-graduacion"><strong>{{ $tasaGraduacion }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Tasa de Abandono</h6>
                            </td>
                            <td id="tasa-abandono"><strong>{{ $tasaAbandono }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Tasa de Eficiencia</h6>
                            </td>
                            <td id="tasa-eficiencia"><strong>{{ $tasaEficiencia }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Tasa de Éxito</h6>
                            </td>
                            <td id="tasa-exito"><strong>{{ $tasaExito }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Tasa de Rendimiento</h6>
                            </td>
                            <td id="tasa-rendimiento"><strong>{{ $tasaRendimiento }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Duración Media de los Estudios</h6>
                            </td>
                            <td id="duracion-media-estudio"><strong>{{ $duracionMediaEstudio }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <th colspan="2"><strong>
                                    <h5 class="text-center text-info">Datos para los indicadores</h5>
                                </strong></th>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos de la cohorte graduados en el 4º año
                                </h6>
                            </td>
                            <td id="td-graduados-4-año"><strong>{{ $tdGraduados4año }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos de la cohorte graduados en <span
                                        id="periodo-graduacion"></span></h6>
                            </td>
                            <td id="td-graduados-periodo"><strong>{{ $tdGraduadosPeriodo }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos total de la nueva cohorte en <span
                                        id="periodo-ano-1"></span></h6>
                            </td>
                            <td id="td-total-alumnos-cohortes"><strong>{{ $tdTotalAlumnosCohortes }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos no matriculados en el año de graduación
                                    o el siguiente</h6>
                            </td>
                            <td id="td-nro_alumnos-no-matriculados"><strong>{{ $tdNroAlumnosNoMatriculados }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº total de créditos teóricos del Plan de Estudios
                                </h6>
                            </td>
                            <td id="td-nro-total-creditos"><strong>{{ $tdNroTotalCreditos }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº total de créditos en los que se matriculó
                                    realmente la cohorte saliente</h6>
                            </td>
                            <td id="td-total-cre-cohorte-saliente"><strong>{{ $tdTotalCreCohorteSaliente }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº total de créditos superados (NO los adaptados,
                                    convalidados o reconocidos)</h6>
                            </td>
                            <td id="td-total-cre-no-adap-conv-rec"><strong>{{ $tdTotalCreNoAdapConvRec }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº total de créditos presentados a examen</h6>
                            </td>
                            <td id="td-total-creditos-presentados-examen"><strong>{{ $tdTotalCreditosPresentadosExamen }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 4 años
                                </h6>
                            </td>
                            <td id="td-nro-alumnos-terminan-4-anos"><strong>{{ $tdNroAlumnosTerminan4Anos }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 5 años
                                </h6>
                            </td>
                            <td id="td-nro-alumnos-terminan-5-anos"><strong>{{ $tdNroAlumnosTerminan5Anos }}</strong></td>
                        </tr>
                        <tr class="alto">
                            <td>
                                <h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 6 años
                                </h6>
                            </td>
                            <td id="td-nro-alumnos-terminan-6-anos"><strong>{{ $tdNroAlumnosTerminan6Anos }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>           
        </div>
    </main>
</body>

</html>