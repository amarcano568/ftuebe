@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <h3 class="text-primary"><i class="text-primary fab fa-tumblr"></i> Asignar Tareas</h3>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="form-tareas-asignadas" data-parsley-validate="" action="guardar-tareas-asignadas">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="id_alumno">Alumno</label>
                            <select required data-placeholder="Seleccione un alumno" name="id_alumno" id="id_alumno"
                                class="form-control chosen-select">
                                <option value=""></option>
                                @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->numIdAlumno }}">{{ $alumno->strNombre }}
                                        {{ $alumno->strApellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <label for="tareas_asignadas">Tareas asignadas</label>
                            <select multiple data-placeholder="Seleccione las tareas" name="tareas_asignadas[]" id="tareas_asignadas"
                                class="form-control chosen-select" required>
                                <option value=""></option>
                                @foreach($trabajos as $trabajo)
                                    <option value="{{ $trabajo->id }}">{{ $trabajo->trabajo }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <button style="float: right;" class="btn btn-success"><i class="fas fa-plus-circle"></i> Asignar Tarea(s)</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{ asset('jsApp/asignar-tareas.js') }}"></script>
@stop
