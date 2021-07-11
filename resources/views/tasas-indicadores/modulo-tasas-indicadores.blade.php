@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <h3 class="text-primary"><i class="far fa-file-pdf"></i> Indicadores-Tasas SIGC.</h3>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="" id="form-pdf-certificados">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Período</label>
                            <select data-placeholder="Seleccione una opción" name="periodo" id="periodo"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="2011-2016">2011-2016</option>
                                <option value="2012-2017">2012-2017</option>
                                <option value="2013-2018">2013-2018</option>
                                <option value="2014-2019">2014-2019</option>
                                <option value="2015-2020">2015-2020</option>
                                <option value="2016-2021">2016-2021</option>
                                <option value="2017-2022">2017-2022</option>
                                <option value="2018-2023">2018-2023</option>
                                <option value="2019-2024">2019-2024</option>
                                <option value="2020-2025">2020-2025</option>
                                <option value="2021-2026">2021-2026</option>
                                <option value="2022-2027">2022-2027</option>
                                <option value="2023-2028">2023-2028</option>
                                <option value="2024-2029">2024-2029</option>
                                <option value="2025-2030">2025-2030</option>
                                <option value="2026-2031">2026-2031</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Estudio</label>
                            <select data-placeholder="Seleccione una opción" name="tipo_estudio" id="tipo_estudio"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="8">Grado Oficial</option>
                                <option value="9">Master Oficial</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="">Aplicar filtro</label>
                            <button class="btn btn-primary" id="btn-generar-indicadores">
                                <i class="cil-check-alt"></i> Generar tasas indicadores
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body" id="div-mostrar-tasas">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="head-datos-finales">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#resumen"
                                            aria-expanded="true" aria-controls="resumen">
                                            <h5 class="text-primary">DATOS FINALES</h5>
                                        </button>
                                    </h5>
                                </div>
                                <div id="resumen" class="collapse show" aria-labelledby="head-datos-finales"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row" id="div-datos-finales">
                                                    <div class="col-sm-9">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2"><strong><h5 class="text-center text-info">INDICADORES PRINCIPALES PARA EL SISTEMA DE CALIDAD</h5></strong></th>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Tasa de Graduación</h6></td>
                                                                    <td id="tasa-graduacion"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Tasa de Abandono</h6></td>
                                                                    <td id="tasa-abandono"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Tasa de Eficiencia</h6></td>
                                                                    <td id="tasa-eficiencia"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Tasa de Éxito</h6></td>
                                                                    <td id="tasa-exito"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Tasa de Rendimiento</h6></td>
                                                                    <td id="tasa-rendimiento"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Duración Media de los Estudios</h6></td>
                                                                    <td id="duracion-media-estudio"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2"><strong><h5 class="text-center text-info">Datos para los indicadores</h5></strong></th>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos de la cohorte graduados en el 4º año</h6></td>
                                                                    <td id="td-graduados-4-año"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos de la cohorte graduados en <span id="periodo-graduacion"></span></h6></td>
                                                                    <td id="td-graduados-periodo"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos total de la nueva cohorte en <span id="periodo-ano-1"></span></h6></td>
                                                                    <td id="td-total-alumnos-cohortes"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos no matriculados en el año de graduación o el siguiente</h6></td>
                                                                    <td id="td-nro_alumnos-no-matriculados"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº total de créditos teóricos del Plan de Estudios</h6></td>
                                                                    <td id="td-nro-total-creditos"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº total de créditos en los que se matriculó realmente la cohorte saliente</h6></td>
                                                                    <td id="td-total-cre-cohorte-saliente"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº total de créditos superados (NO los adaptados, convalidados o reconocidos)</h6></td>
                                                                    <td id="td-total-cre-no-adap-conv-rec"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº total de créditos presentados a examen</h6></td>
                                                                    <td id="td-total-creditos-presentados-examen"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 4 años</h6></td>
                                                                    <td id="td-nro-alumnos-terminan-4-anos"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 5 años</h6></td>
                                                                    <td id="td-nro-alumnos-terminan-5-anos"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h6 class="text-left text-success">Nº de alumnos que terminan los estudios en 6 años</h6></td>
                                                                    <td id="td-nro-alumnos-terminan-6-anos"></td>
                                                                </tr>                                                                
                                                            </tbody>
                                                        </table>    
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button id="btn-imprimir-tasas" class="btn btn-success">Imprimir</button>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="text-primary">Nº total de créditos en los que se matriculó realmente </h5>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div id="table1" class="espera-cargando"></div>
                                        {{-- <div id="table1_resumen_1" class="espera-cargando"></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            <h5 class="text-primary">Nº total de créditos superados (NO los adaptados, convalidados o reconocidos)</h5>                                            
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div id="table2" class="espera-cargando"></div>
                                        {{-- <div id="table1_resumen_2" class="espera-cargando"></div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            <h5 class="text-primary">Nº total de créditos presentados a examen (No entran NP, Convalidados, Incompleto)</h5>                                            
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div id="table3" class="espera-cargando"></div>
                                        {{-- <div id="table1_resumen_3" class="espera-cargando"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
    </div>
</div>
@include('tasas-indicadores.modal-resumen-indicadores')
@endsection
@section('javascript')
<script src="{{ asset('jsApp/tasas-indicadores.js') }}"></script>
@stop
