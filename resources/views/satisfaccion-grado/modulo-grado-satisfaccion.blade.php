@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <h3 class="text-primary"<i class="far fa-grin"></i> GRADO DE SATISFACCION.</h3>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                    <a href="" id="download" style="display: none">download</a>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Grupo a procesar</label>
                            <select data-placeholder="Seleccione una opción" name="grupo" id="grupo"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="profesorado">Profesorado</option>
                                <option value="alumnado">Alumnado</option>
                                <option value="pas">PAS</option>
                                <option value="otros">Otros</option>
                                <option value="egresados">Egresados</option>
                                <option value="empleadores">Empleadores</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
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
                        <div class="col-sm-3">
                            <label for="">Estudio</label>
                            <select data-placeholder="Seleccione una opción" name="tipo_estudio" id="tipo_estudio"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                <option value="grado-oficial">Grado Oficial</option>
                                <option value="master-oficial">Master Oficial</option>
                            </select>
                        </div>                        
                    </div>
                    <br>
                        <div class="tipos-grupos" id="div-egresados" style="display: none">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="empleadores">ExAlumnos</label>
                                    <input type="number" class="form-control" id="ExAlumnos" name="ExAlumnos">
                                </div>
                            </div>
                        </div>
                        <div class="tipos-grupos" id="div-empleadores" style="display: none">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="empleadores">Empleadores</label>
                                    <input type="number" class="form-control" id="empleadores" name="empleadores">
                                </div>
                            </div>
                        </div>
                        <div class="tipos-grupos" id="div-profesorado" style="display: none">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="profesores">Profesores</label>
                                    <input type="number" class="form-control" id="profesores" name="profesores">
                                </div>
                                <div class="col-sm-3">
                                    <label for="asignaturas">Asignaturas</label>
                                    <input type="number" class="form-control" id="asignaturas" name="asignaturas">              
                                </div>
                            </div>
                        </div>
                        <div class="tipos-grupos" id="div-personal" style="display: none">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="personal">Personal</label>
                                    <input type="number" class="form-control" id="personal" name="personal">
                                </div>     
                            </div>                     
                        </div>
                        <div class="tipos-grupos" id="div-alumnos" style="display: none">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title">Nº alumnos / curso</h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="grado_1_alumno_cruso">1º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_1_alumno_cruso" name="grado_1_alumno_cruso">
                                                </div> 
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_2_alumno_curso">2º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_2_alumno_curso" name="grado_2_alumno_curso">
                                                </div>
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_3_alumno_curso">3º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_3_alumno_curso" name="grado_3_alumno_curso">
                                                </div>
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_4_alumno_curso">4º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_4_alumno_curso" name="grado_4_alumno_curso">
                                                </div>    
                                            </div> 
                                        </div>
                                    </div>      
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title">Nº Encuestas por curso</h5>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="grado_1">1º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_1" name="grado_1">
                                                </div> 
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_2">2º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_2" name="grado_2">
                                                </div>
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_3">3º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_3" name="grado_3">
                                                </div>
                                                <div class="col-sm-3 grado-view">
                                                    <label for="grado_4">4º de Grado</label>
                                                    <input type="number" class="form-control" id="grado_4" name="grado_4">
                                                </div>    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-success btn-lg" id="btn-cargar-fichero">
                                <i class="fas fa-cloud-upload-alt"></i>&nbsp;&nbsp;Cargar fichero csv
                            </button>
                        </center>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div id="formDropZone"></div>                            
                        </div>

                    </div>
            </div>
        </div>
        <hr>
        

        <br>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{ asset('jsApp/grado-satisfaccion.js') }}"></script>
@stop
