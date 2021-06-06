@extends('welcome')
@section('contenido')
<br><br>
<style>
    th {
        height: 15px!important;
    }
    .color-header{
        background-color: #eaf1f3;
    }
</style>
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-8">
                                <i class="fas fa-graduation-cap"></i> Expediente académico
                            </div>
                            <div class="col-sm-2">
                                <a href=""><i class="text-primary fa-2x fas fa-print"></i></a>
                                &nbsp;&nbsp;
                                <a href=""><i class="text-info fa-2x far fa-envelope"></i></a>
                            </div>
                            <div class="col-sm-2">
                                <select name="language" id="language" class="form-control chosen-select">
                                    <option value="es">Español</option>
                                    <option value="en">Ingles</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                <label for="">Id</label>
                                <strong>{{ $alumno->numIdAlumno }}</strong>
                            </div>
                            <div class="col-sm-3">
                                <strong>{{ $alumno->strNombre }} {{ $alumno->strApellidos }}</strong>
                            </div>
                            <div class="col-sm-2">
                                <i class="far fa-address-card"></i> {{ $alumno->documento }} - {{ $alumno->strNif }}
                            </div>
                            <div class="col-sm-3">
                                <label for="">Expediente #</label>
                                <strong>{{ $alumno->strCodigoExpediente }}</strong>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table-expediente-curso-1" style="display: table;width: 100%"
                                    class="table-hoja-1 table table-hover">

                                    <tbody id="body-expediente-curso-1">
                                        <tr height="5em;" class="color-header">
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong>Primer Curso</strong></td>
                                            <td class="text-center" colspan="3"><strong>Calificación</strong></td>                       
                                        </tr>
                                        <tr class="color-header">
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong>Materia</strong></td>
                                            <td style="width: 15%" class="text-center"><strong>Curso académico</strong></td>
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" ><strong>Créditos ECTS</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>Númerica</strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong>Cualitativa</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @foreach ($curso1 as $curso)
                                            <tr>
                                                <td>{{ $curso['idAsig']}}</td>
                                                <td>{{ $curso['materia']}}</td>
                                                <td></td>
                                                <td class="text-center">{{ $curso['credito']}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Créditos ECTS</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Aritmética</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Ponderada</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el segundo curso --}}
                                        <tr class="color-header" height="5em;" >
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong>Segundo Curso</strong></td>
                                            <td class="text-center" colspan="3"><strong>Calificación</strong></td>                       
                                        </tr>
                                        <tr class="color-header" >
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong>Materia</strong></td>
                                            <td style="width: 15%" class="text-center"><strong>Curso académico</td>
                                            <td style="width: 15%;border-right: 1px solid #999;" class="text-center"><strong>Créditos ECTS</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>Númerica</strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong>Cualitativa</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @foreach ($curso2 as $curso)
                                            <tr>
                                                <td>{{ $curso['idAsig']}}</td>
                                                <td>{{ $curso['materia']}}</td>
                                                <td></td>
                                                <td class="text-center">{{ $curso['credito']}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Créditos ECTS</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Aritmética</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Ponderada</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el tercer curso --}}
                                        <tr class="color-header" height="5em;" >
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong>Tercer Curso</strong></td>
                                            <td class="text-center" colspan="3"><strong>Calificación</strong></td>                       
                                        </tr>
                                        <tr class="color-header" >
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong>Materia</strong></td>
                                            <td style="width: 15%" class="text-center"><strong>Curso académico</strong></td>
                                            <td style="width: 15%;border-right: 1px solid #999;" class="text-center"><strong>Créditos ECTS</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>Númerica</strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong>Cualitativa</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @foreach ($curso3 as $curso)
                                            <tr>
                                                <td>{{ $curso['idAsig']}}</td>
                                                <td>{{ $curso['materia']}}</td>
                                                <td></td>
                                                <td class="text-center">{{ $curso['credito']}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Créditos ECTS</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Aritmética</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Ponderada</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el cuarto curso --}}
                                        <tr class="color-header" height="5em;" >
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong>Cuarto Curso</strong></td>
                                            <td class="text-center" colspan="3"><strong>Calificación</strong></td>                       
                                        </tr>
                                        <tr class="color-header" >
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong>Materia</strong></td>
                                            <td style="width: 15%" class="text-center"><strong>Curso académico</strong></td>
                                            <td style="width: 15%;border-right: 1px solid #999;" class="text-center"><strong>Créditos ECTS</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>Númerica</strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong>Cualitativa</strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @foreach ($curso4 as $curso)
                                            <tr>
                                                <td>{{ $curso['idAsig']}}</td>
                                                <td>{{ $curso['materia']}}</td>
                                                <td></td>
                                                <td class="text-center">{{ $curso['credito']}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Créditos ECTS</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Aritmética</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Media Ponderada</strong></td>
                                            <td class="text-center"><strong>0.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
</div>

@endsection
@section('javascript')

@stop
