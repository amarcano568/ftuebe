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
<input type="text" id="estudio" value="{{$estudio}}" style="display: none;">
<input type="text" id="idAlumno" value="{{$idAlumno}}" style="display: none;">
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
                                    <option value="es" <?php echo $language == 'es' ? 'selected' : '' ?>>Español</option>
                                    <option value="en" <?php echo $language == 'en' ? 'selected' : '' ?>>Ingles</option>
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
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong> <?php echo $language == 'es' ? 'Primer Curso' : 'First Course' ?></strong></td>
                                            <td class="text-center" colspan="3"><strong><?php echo $language == 'es' ? 'Calificación' : 'Qualification' ?></strong></td>                       
                                        </tr>
                                        <tr class="color-header">
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong><?php echo $language == 'es' ? 'Materia' : 'Class' ?></strong></td>
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Curso académico' : 'Academic course' ?></strong></td>
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" ><strong><?php echo $language == 'es' ? 'Créditos ECTS' : 'ECTS credits' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong><?php echo $language == 'es' ? 'Númerica' : 'Numerical' ?></strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Cualitativa' : 'Qualitative' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @php
                                            $creditos = 0;
                                            $media = 0;
                                            $i = 0;
                                        @endphp
                                        @foreach ($curso1 as $curso)
                                            <tr>
                                                <td>{{ $curso['idAsig']}}</td>
                                                <td>{{ $curso['materia']}}</td>
                                                <td class="text-center">{{ $curso['curso']}}</td>
                                                <td class="text-center">{{ $curso['credito']}}</td>
                                                <td class="text-center {{ $curso['color'] }}">{{ $curso['nota']}}</td>
                                                <td class="text-center {{ $curso['color'] }}">{{ $curso['cualitativa']}}</td>
                                                <td class="text-center">{{ $curso['eeuu']}}</td>
                                                @php
                                                    $creditos +=  $curso['credito'];
                                                    $i++;
                                                    $media += $curso['nota'];
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                            <td class="text-center"><strong>{{number_format($mp_c1, 2, ',', ' ')}}</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el segundo curso --}}
                                        <tr height="5em;" class="color-header">
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong> <?php echo $language == 'es' ? 'Segundo Curso' : 'Second course' ?></strong></td>
                                            <td class="text-center" colspan="3"><strong><?php echo $language == 'es' ? 'Calificación' : 'Qualification' ?></strong></td>                       
                                        </tr>
                                        <tr class="color-header">
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong><?php echo $language == 'es' ? 'Materia' : 'Class' ?></strong></td>
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Curso académico' : 'Academic course' ?></strong></td>
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" ><strong><?php echo $language == 'es' ? 'Créditos ECTS' : 'ECTS credits' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong><?php echo $language == 'es' ? 'Númerica' : 'Numerical' ?></strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Cualitativa' : 'Qualitative' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @php
                                            $creditos = 0;
                                            $media = 0;
                                            $i = 0;
                                        @endphp
                                    @foreach ($curso2 as $curso)
                                        <tr>
                                            <td>{{ $curso['idAsig']}}</td>
                                            <td>{{ $curso['materia']}}</td>
                                            <td class="text-center">{{ $curso['curso']}}</td>
                                            <td class="text-center">{{ $curso['credito']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['nota']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['cualitativa']}}</td>
                                            <td class="text-center">{{ $curso['eeuu']}}</td>
                                            @php
                                                $creditos +=  $curso['credito'];
                                                $i++;
                                                $media += $curso['nota'];
                                            @endphp
                                        </tr>
                                    @endforeach                                   
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                            <td class="text-center"><strong>{{number_format($mp_c2, 2, ',', ' ')}}</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el tercer curso --}}
                                        <tr height="5em;" class="color-header">
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong> <?php echo $language == 'es' ? 'Tercer Curso' : 'Third course' ?></strong></td>
                                            <td class="text-center" colspan="3"><strong><?php echo $language == 'es' ? 'Calificación' : 'Qualification' ?></strong></td>                       
                                        </tr>
                                        <tr class="color-header">
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong><?php echo $language == 'es' ? 'Materia' : 'Class' ?></strong></td>
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Curso académico' : 'Academic course' ?></strong></td>
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" ><strong><?php echo $language == 'es' ? 'Créditos ECTS' : 'ECTS credits' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong><?php echo $language == 'es' ? 'Númerica' : 'Numerical' ?></strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Cualitativa' : 'Qualitative' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                         @php
                                            $creditos = 0;
                                            $media = 0;
                                            $i = 0;
                                        @endphp
                                    @foreach ($curso3 as $curso)
                                        <tr>
                                            <td>{{ $curso['idAsig']}}</td>
                                            <td>{{ $curso['materia']}}</td>
                                            <td class="text-center">{{ $curso['curso']}}</td>
                                            <td class="text-center">{{ $curso['credito']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['nota']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['cualitativa']}}</td>
                                            <td class="text-center">{{ $curso['eeuu']}}</td>
                                            @php
                                                $creditos +=  $curso['credito'];
                                                $i++;
                                                $media += $curso['nota'];
                                            @endphp
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                            <td class="text-center"><strong>{{number_format($mp_c3, 2, ',', ' ')}}</strong></td>
                                        </tr>
                                        <tr><td colspan="7"></td></tr>
                                        {{-- Empieza el cuarto curso --}}
                                        <tr height="5em;" class="color-header">
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" colspan="4"><strong> <?php echo $language == 'es' ? 'Cuarto Curso' : 'Fourth course' ?></strong></td>
                                            <td class="text-center" colspan="3"><strong><?php echo $language == 'es' ? 'Calificación' : 'Qualification' ?></strong></td>                       
                                        </tr>
                                        <tr class="color-header">
                                            <td style="width: 5%" class="text-center"><strong>IdAsig.</strong></td>
                                            <td style="width: 30%" class="text-center"><strong><?php echo $language == 'es' ? 'Materia' : 'Class' ?></strong></td>
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Curso académico' : 'Academic course' ?></strong></td>
                                            <td style="border-right: 1px solid #999;" class="table-hoja-1 text-center" ><strong><?php echo $language == 'es' ? 'Créditos ECTS' : 'ECTS credits' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong><?php echo $language == 'es' ? 'Númerica' : 'Numerical' ?></strong></td>                                   
                                            <td style="width: 15%" class="text-center"><strong><?php echo $language == 'es' ? 'Cualitativa' : 'Qualitative' ?></strong></td>
                                            <td style="width: 7.5%" class="text-center"><strong>EE.UU.</strong></td>
                                        </tr>
                                        @php
                                            $creditos = 0;
                                            $media = 0;
                                            $i = 0;
                                        @endphp
                                    @foreach ($curso4 as $curso)
                                        <tr>
                                            <td>{{ $curso['idAsig']}}</td>
                                            <td>{{ $curso['materia']}}</td>
                                            <td class="text-center">{{ $curso['curso']}}</td>
                                            <td class="text-center">{{ $curso['credito']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['nota']}}</td>
                                            <td class="text-center {{ $curso['color'] }}">{{ $curso['cualitativa']}}</td>
                                            <td class="text-center">{{ $curso['eeuu']}}</td>
                                            @php
                                                $creditos +=  $curso['credito'];
                                                $i++;
                                                $media += $curso['nota'];
                                            @endphp
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                            <td class="text-center"><strong>{{number_format($mp_c4, 2, ',', ' ')}}</strong></td>
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
    <script src="{{ asset('jsApp/expediente-academico.js') }}"></script>
@stop