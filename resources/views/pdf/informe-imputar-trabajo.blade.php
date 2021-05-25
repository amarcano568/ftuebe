@extends('welcome')
@section('contenido')
<br><br>
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-body">
                <form action="" id="form-pdf-imputar-trabajo">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h3 class="text-primary"><i class="far fa-file-pdf"></i> Informe de tareas realizadas</h3>
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
                        <div class="col-sm-3">
                            <label for="">Seleccione el mes</label>
                            <select data-placeholder="Seleccione el mes" name="mes_filtro" id="mes_filtro"
                                class="form-control chosen-select">
                                <option value=""></option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Seleccione el año</label>
                            <select data-placeholder="Seleccione el mes" name="ano_filtro" id="ano_filtro"
                                class="form-control chosen-select">
                                <option value=""></option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
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
<script src="{{ asset('jsApp/pdf-imputar-trabajo.js') }}"></script>
@stop
