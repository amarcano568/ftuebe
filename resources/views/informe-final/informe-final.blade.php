@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <h3 class="text-primary"><i class="far fa-file-pdf"></i> Informe final.</h3>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="" id="form-pdf-certificados">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Informe</label>
                            <select data-placeholder="Seleccione una opción" name="informe" id="informe"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="indicadores">Indicadores</option>
                                <option value="alumnos">Alumnos</option>
                                <option value="profesores">Profesores</option>
                                <option value="pas">PAS</option>
                                <option value="egresados">Egresados</option>
                                <option value="empleadores">Empleadores</option>     
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Estudio</label>
                            <select data-placeholder="Seleccione una opción" name="tipo_estudio" id="tipo_estudio"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="grado-oficial">Grado Oficial</option>
                                <option value="master-oficial">Master Oficial</option>
                            </select>
                        </div>
                        <div class="col-sm-3 periodo-cohorte"  id="div-periodo">
                            <label for="">Período</label>
                            <select data-placeholder="Seleccione una opción" name="periodo" id="periodo"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="2016-2017">2016-2017</option>
                                <option value="2017-2018">2017-2018</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2025-2026">2025-2026</option>
                                <option value="2026-2027">2026-2027</option>
                            </select>
                        </div>
                        <div class="col-sm-3 periodo-cohorte" id="div-cohorte">
                            <label for="">Cohorte</label>
                            <select data-placeholder="Seleccione una opción" name="cohorte" id="cohorte"
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
                            <button class="btn btn-primary" id="btn-generar-informe-final">
                                <i class="cil-check-alt"></i> Generar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>        
        <div class="card card-resultados" id="card-indicadores">
            <div class="card-body">
                <h5 class="card-title">Informe indicadores.</h5>
                @include('informe-final.table-indicadores')
            </div>            
        </div>
        <div class="card card-resultados" id="card-alumnos">
            <div class="card-body">
                <h5 class="card-title">Informe alumnos.</h5>
                @include('informe-final.table-alumnos')
            </div>
        </div>
        <div class="card card-resultados" id="card-profesores">
            <div class="card-body">
                <h5 class="card-title">Informe profesores.</h5>
            </div>
        </div>
        <div class="card card-resultados" id="card-pas">
            <div class="card-body">
                <h5 class="card-title">Informe PAS.</h5>
            </div>
        </div>
        <div class="card card-resultados" id="card-egresados">
            <div class="card-body">
                <h5 class="card-title">Informe egresados.</h5>
            </div>
        </div>
        <div class="card card-resultados" id="card-empleadores">
            <div class="card-body">
                <h5 class="card-title">Informe empleadores.</h5>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('jsApp/informe-final.js') }}"></script>
@stop
