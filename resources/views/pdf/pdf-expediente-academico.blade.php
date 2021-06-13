<html>

<head>
    <link href="{{ asset('css/bootstrap-3-simple.min.css') }}" rel="stylesheet" />
    <style>
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
        }

        header { position: fixed; 
        left: 0px; 
        top: -1em; 
        right: 0px; 
        height: 3em;
        text-align: center; }

        body {
            margin-top: -7.5px;
        }

        .otraPagina {
            page-break-before: always;
        }

        .otraPagina:last-child {
            page-break-before: never;
        }

        td {
            padding: 0.10em !important;
            height: 1.30em;
            border: 1px solid grey;
          
        }

        th {
            padding: 0.10em !important;
            height: 1.30em;
            border: 1px solid grey;
            border-top-color: 1px solid grey;
        }

        table {
            border-collapse: collapse;
        }      
        .page-number:before {
        content: "Pág: " counter(page);
        }
        
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-xs-2">
                <img src="img/logo_vertical.png" alt="" width="100%">
            </div>
            <div class="col-xs-8 text-center">
                <h3><strong>FACULTAD DE TEOLOGÍA</strong></h3>
                <h4><strong>UNIÓN EVANGÉLICA BAUTISTA DE ESPAÑA</strong></h4>
                <h5>“Capacitando para el ministerio cristiano desde 1922” (Ef. 4:12)</h5>
            </div>
        </div>
    </header>
    <footer>
        <div class="row">
            <hr>
            <div class="col-xs-12">
                <p style="font-size: 12px;" class="text-center">
                    Entidad inscrita en el Registro de Universidades, Centros y Títulos (RUCT) del<br>
                    Ministerio de Educación con el núm. 28053204<br>
                    C/ Marqués de la Valdavia, 134. 28100 Alcobendas (Madrid)<br>
                    Tfno. 916.624.099 – Fax. 916.624.098 - 916.624.092 (residencia)<br>
                    Correo-e: secretaria@ftuebe.es<br>
                    Web: www.ftuebe.es<br>
                </p>
            </div>
            
        </div>
    </footer>
    <main>  
        <br><br><br><br><br><br>
        <div class="row">
            <div class="col-xs-12">
                <p style="font-size: 12px;text-align:justify">
                    {{ $title['parrafo1'] }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3><strong><?php echo $language == 'es' ? 'Certifica' : 'Certifies' ?></strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p style="font-size: 12px;text-align:justify">
                    {{ $title['parrafo2'] }}
                </p>
            </div>
        </div>
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
                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                            <td class="text-center"><strong>{{number_format($mp_c1, 2, ',', ' ')}}</strong></td>
                        </tr>                        
                    </tbody>
                </table>
                    {{-- De aqui en adelante solo para Master --}}
                    @if ( $estudio != 'master_grado_oficial' and $estudio != 'master_titulo_propio')
                        {{-- Empieza el segundo curso --}}
                        <div class="otraPagina">
                            <br><br><br><br><br><br>
                            <table id="table-expediente-curso-1" style="display: table;width: 100%" class="table-hoja-1 table table-hover">
                                <tbody id="body-expediente-curso-1">                            
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
                                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                            <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                            <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                            <td class="text-center"><strong>{{number_format($mp_c2, 2, ',', ' ')}}</strong></td>
                                        </tr>                                        
                                </tbody>
                            </table>
                        </div>
                            {{-- Empieza el tercer curso --}}
                        <div class="otraPagina">
                            <br><br><br><br><br><br>
                            <table id="table-expediente-curso-1" style="display: table;width: 100%" class="table-hoja-1 table table-hover">
                               <tbody id="body-expediente-curso-1">    
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
                                    <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                    <td class="text-center"><strong>{{ $creditos }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                    <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                    <td class="text-center"><strong>{{number_format($mp_c3, 2, ',', ' ')}}</strong></td>
                                </tr>                                
                               </tbody>
                            </table>
                        </div>
                            {{-- Empieza el cuarto curso --}}
                        <div class="otraPagina">
                            <br><br><br><br><br><br>
                            <table id="table-expediente-curso-1" style="display: table;width: 100%" class="table-hoja-1 table table-hover">
                                <tbody id="body-expediente-curso-1">    
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
                                <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Total Créditos ECTS' : 'Total ECTS credits' ?></strong></td>
                                <td class="text-center"><strong>{{ $creditos }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Aritmética' : 'Arithmetic average' ?></strong></td>
                                <td class="text-center"><strong>{{ number_format($media/$i, 2, ',', ' ') }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-right"><strong><?php echo $language == 'es' ? 'Media Ponderada' : 'Weighted average' ?></strong></td>
                                <td class="text-center"><strong>{{number_format($mp_c4, 2, ',', ' ')}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                @endif

                <div class="row">
                    <div class="col-xs-12">
                        <p style="font-size: 12px;text-align:justify">
                            {{ $title['parrafo3'] }}
                        </p>
                    </div>
                </div> 
                    
            </div>
        </div>
       
        
        
        
    </main>
</body>

</html>