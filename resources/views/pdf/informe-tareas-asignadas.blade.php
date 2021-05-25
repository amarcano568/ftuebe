@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-body">
                <form action="" id="form-pdf-tareas-asignadas">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h3 class="text-primary"><i class="far fa-file-pdf"></i> Informe de tareas asignadas</h3>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Seleccione un alumno</label>
                            <select data-placeholder="Seleccione un alumno" name="id_alumno" id="id_alumno"
                                class="form-control chosen-select">
                                <option value=""></option>
                                @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->numIdAlumno }}">{{ $alumno->strNombre }}
                                        {{ $alumno->strApellidos }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="col-sm-2">
                            <label for="">Status</label>
                            <select data-placeholder="Status" name="status" id="status"
                                class="form-control chosen-select">
                                <option value=""></option>
                                <option selected value="1">Activos</option>
                                <option value="0">Inactivos</option>                                
                            </select>
                        </div> 
                        <div class="col-sm-2">
                            <label for="">Aplicar filtro</label>
                            <button class="btn btn-primary" id="btn-generar-pdf">
                                <i class="far fa-file-pdf"></i> Generar pdf
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
                    <div class="card-body">
                        <iframe id="ObjPdf" src="" width="100%" height="500" type="application/pdf"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <br>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{ asset('jsApp/pdf-tareas-asignadas.js') }}"></script>
@stop
