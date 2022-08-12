@extends('welcome')
@section('contenido')
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-info shadow-lg">
                        <div
                            class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg" id="pensionesHoy">Alumnos</div>
                                <div>Ultima vez que se actualizo</div>
                                <span id="actualizacion-alumnos"></span>
                            </div>
                        </div>
                        <div style="height:125px;"  id="pensionesHoyFecha">
                            <center>
                                <br>
                                <a style="color: white" href="{{URL::to('/gestionar-estudiantes')}}">
                                    <strong>Ir a listado de estudiantes <i class="fas fa-arrow-right"></i></strong>
                                </a>
                            </center>
                        </div>                        
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-info">
                        <div
                            class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg" id="pensionesMesActual">Grupos familiares</div>
                                <div>Ultima vez que se creo un grupo </div>
                            </div>
                        </div>
                        <div style="height:150px;"  id="pensionesMesActualFecha">
                            <center>
                                <br>
                                <a style="color: white" href="{{URL::to('/gestionar-grupos-familiares')}}">
                                    <strong>Ir a crear un nuevo grupo <i class="fas fa-arrow-right"></i></strong>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>              
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-info">
                        <div
                            class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-value-lg" id="pensionesAnoActual">Fichas alumnos</div>
                                <div>Ultima vez que se actualizo</div>
                                <span id="actualizacion-fichas"></span>
                            </div>
                        </div>
                        <div style="height:125px;"  id="pensionesAnoActualFecha">                            
                        </div>                        
                    </div>
                </div>                
                <!-- /.col-->
                  <!-- /.col-->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-gradient-warning">
                        <div
                            class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>                                
                                <button style="width:100%;" id="btn-importar-nuevos-alumnos" class="btn btn-warning btn-sm"><i class="far fa-file-excel"></i>&nbsp;Importar nuevos alumnos</button>                                
                                <button style="width:100%; margin-top: 0.5em;" id="btn-importar-fichas-alumnos" class="btn btn-warning btn-sm"><i class="far fa-file-excel"></i>&nbsp;Importar fichas alumnos</button>
                                <button style="width:100%; margin-top: 0.5em;" id="btn-importar-grupos" class="btn btn-warning btn-sm"><i class="far fa-file-excel"></i>&nbsp;Importar grupos</button>
                                <button style="width:100%; margin-top: 0.5em;" id="btn-importar-matriculas-grupos" class="btn btn-warning btn-sm"><i class="far fa-file-excel"></i>&nbsp;Importar matrículas grupos</button>
                                <button style="width:100%; margin-top: 0.5em;" id="btn-importar-matriculas" class="btn btn-warning btn-sm"><i class="far fa-file-excel"></i>&nbsp;Importar matrículas</button>
                            </div>                             
                        </div>    
                        <div style="height:20px;"></div>              
                    </div>
                </div>
            </div>
            <!-- /.row-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <br><br>
                        <center>
                            <img src="img/logo_vertical.png" alt="" class="img-responsive">
                        </center>
                        <br><br>
                    </div>    
                </div>
                <div class="card-footer">
                    {{-- <div class="row text-center">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                            <div class="text-muted">Visits</div><strong>29.703 Users (40%)</strong>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-gradient-success" role="progressbar"
                                    style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                            <div class="text-muted">Unique</div><strong>24.093 Users (20%)</strong>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-gradient-info" role="progressbar"
                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                            <div class="text-muted">Pageviews</div><strong>78.706 Views (60%)</strong>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-gradient-warning" role="progressbar"
                                    style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                            <div class="text-muted">New Users</div><strong>22.123 Users (80%)</strong>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar bg-gradient-danger" role="progressbar"
                                    style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                            <div class="text-muted">Bounce Rate</div><strong>40.15%</strong>
                            <div class="progress progress-xs mt-2">
                                <div class="progress-bar" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- /.card-->
       
            <!-- /.row-->
          
            <!-- /.row-->
        </div>
    </div>
    @include('modal-importar-alumnos')
    @include('modal-importar-fichas-alumnos')
    @include('modal-importar-grupos')
    @include('modal-importar-matriculas-grupos')
    @include('modal-importar-matriculas')
</main>

@endsection
@section('javascript')
<script src="{{ asset('jsApp/inicio.js')}}"></script> 
@stop