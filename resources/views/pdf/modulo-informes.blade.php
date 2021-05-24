@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-body">
                <form action="" id="form-pdf-certificados">
                    @csrf
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
                        <div class="col-sm-5">
                            <label for="">Seleccione el certificado</label>
                            <select data-placeholder="Seleccione el certificado" name="tipo_certificado" id="tipo_certificado"
                                class="form-control chosen-select">
                                <option value=""></option>
                                <option value="cert-alojamiento-eventual">Certificado de alojamiento eventual</option>
                                <option value="cert-condicion-alumno">Certificado de condición de alumno</option>
                                <option value="cert-condicion-alumno">Certificado de condición de alumno para renovación de visado o NIE </option>
                                <option value="cert-de-empadronamiento">Certificado de empadronamiento</option>
                                <option value="">Informe de habitaciones totales desocupadas entre fechas</option>
                                <option value="">Informe de habitaciones totales ocupadas entre fechas</option>
                                <option value="">Informe de horas anuales realizadas</option>
                                <option value="">Informe de horas mensuales asignadas</option>
                                <option value="">Informe de horas mensuales realizadas</option>
                                <option value="">Informe de mobiliario por habitaciones</option>
                                <option value="">Informe de mobiliario total</option>
                                <option value="">Informe de ocupación de una habitación entre fechas</option>
                                <option value="">Notificación de asignación de alojamiento</option>
                                <option value="">Notificación de asignación de tarea de trabajo</option>
                                <option value="">Notificación de finalización de alojamiento</option>
                                <option value="">Notificación de incumpliento de tarea asignada</option>
                            </select>
                        </div>                       
                        <div class="col-sm-2">
                            <label for="">Aplicar filtro</label>
                            <button class="btn btn-primary" id="btn-generar-pdf">
                                <i class="far fa-file-pdf"></i> Generar pdf
                            </button>
                        </div>
                    </div>
                    @include('pdf.datos_adicionales')
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
<script src="{{ asset('jsApp/certificados.js') }}"></script>
@stop
