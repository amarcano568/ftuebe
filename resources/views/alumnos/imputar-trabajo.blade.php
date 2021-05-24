@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-3">
                <label for="" style="float: right;">Seleccione un alumno:</label>
            </div>
            <div class="col-sm-4">
                <select data-placeholder="Seleccione un alumno" name="id_alumno" id="id_alumno" class="form-control chosen-select">
                    <option value=""></option>
                    @foreach ($alumnos as $alumno)
                        <option value="{{$alumno->numIdAlumno}}">{{$alumno->strNombre}} {{$alumno->strApellidos}}</option>
                    @endforeach
                </select>  
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form id="form-imputar-trabajo" data-parsley-validate="">
                            <input type="text" id="id_alumno_trabajo" name="id_alumno_trabajo" style="display: none;">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="trabajo_id">Trabajo realizado</label>
                                    <select data-placeholder="Seleccione trabajo a imputar" name="trabajo_id"
                                        id="trabajo_id" class="form-control chosen-select" required>
                                        <option value=""></option>
                                        @foreach($trabajos as $trabajo)
                                            <option value="{{ $trabajo->id }}">{{ $trabajo->trabajo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="fecha_trabajo">Fecha</label>
                                    <input type="date" class="form-control" id="fecha_trabajo" name="fecha_trabajo">
                                </div>
                                <div class="col-sm-2">
                                    <label for="fecha_trabajo">Hora inicio</label>
                                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
                                </div> 
                                <div class="col-sm-2">
                                    <label for="fecha_trabajo">Hora fin</label>
                                    <input type="time" class="form-control" id="hora_fin" name="hora_fin">
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="trabajo_id">Observaciones</label>
                                    <textarea name="observaciones_trabajo" id="observaciones_trabajo" rows="2"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">                                   
                                    <button style="float: right;" type="button" id="btn-guardar-trabajo" class="btn btn-success">Guardar trabajo</button>                                             
                                </div>
                            </div>
                            <br>                                                    
                        </form>
                        <hr>
                            <table id="table-trabajos-realizados"
                                class="table table-responsive-sm table-hover table-outline mb-0" style="width: 100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Trabajo</th>
                                        <th class="text-center">Fechas</th>
                                        <th>Mes Año</th>
                                        <th class="text-center">Observaciones</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="body-trabajos-realizados">

                                </tbody>
                            </table>   
                    </div>
                </div>
            </div>
        </div>

        <br>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{ asset('jsApp/imputar-trabajo.js') }}"></script>
@stop
