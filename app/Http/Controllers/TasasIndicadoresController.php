<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Tipo_estudios;
use App\Fichas_alumnos;
use Carbon\Carbon;
use \DataTables;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TasasIndicadoresController extends Controller
{
    public function indicadoresTasas()
    {        
        return view('tasas-indicadores.modulo-tasas-indicadores');
    }

    public function veIndicadoresTasas(Request $request){
        $ano = explode('-',$request->periodo);
        $alumnos = Alumnos::whereYear('fecFechaAltaCentro',$ano[0])->where('numIdTipoAlumno',$request->tipo_estudio)->get();
        $credito = Tipo_estudios::select('creditos')->find($request->tipo_estudio);
        $salida1 = '';
        $tot_creditos = 0;
        $tot_abandona = 0;
        //Nº total de créditos en los que se matriculó realmente
        foreach($alumnos as $alumno){
            $tot_creditos += $credito->creditos;
            $result = $this->td($alumno->numIdAlumno,$request->periodo);
            $salida1 .= '<tr>
                            <td>'.$alumno->strNombre.'</td>
                            <td>'.$alumno->strApellidos.'</td>
                            <td class="text-center">'.$credito->creditos.'</td>
                            '.$result['resultado_1'].'
                        </tr>';
            $tot_abandona += $result['total_abandona'] >= 3 ? 1 : 0;
        }
        $header = $this->th($request->periodo);
        $ano = explode('-',$request->periodo);        
        $table1 = '<table id="table-1" class="table table-responsive-sm table-hover table-outline mb-0" style="width: 100%">                        
                        <thead class="thead-light">
                            <tr>
                                <th rowspan="2" style="width: 10%" class="text-center">Nombre</th>
                                <th rowspan="2" style="width: 10%" class="text-center">Apellidos</th>
                                <th rowspan="2" style="width: 10%" class="text-center">Nº Créditos Teóricos del Plan de estudios</th> 
                                '.$header['fila2'].'
                                <th rowspan="2" class="text-center">Total</th>
                            </tr>
                            <tr>                                
                            '.$header['fila1'].'
                            </tr>
                        </thead>
                        <tbody id="body-table-1">
                            '.$salida1.'
                            <tr class="text-center"><td colspan="3" class="text-right">Créditos anuales</td><td id="table_1_ano_1"></td><td id="table_1_ano_2"></td><td id="table_1_ano_3"></td><td id="table_1_ano_4"></td><td id="table_1_ano_5"></td><td id="table_1_ano_6"></td><td id="table_1_total"></td></tr>
                            <tr class="text-center"><td colspan="6" class="text-right">Nº de alumnos que terminan los estudios en 4, 5  o 6 años</td><td id="table_1_4_anos"></td><td id="table_1_5_anos"></td><td id="table_1_6_anos"></td></tr>
                            <tr class="text-center"><td colspan="3" class="text-right">Total alumnos cohorte '.$ano[0].'</td><td id="alumnos_cohortes"></td><td colspan="2">Alumnos graduados en los distintos años</td><td id="alumnos_graduados_4"></td><td id="alumnos_graduados_5"></td><td id="alumnos_graduados_6"></td></tr>
                            <tr class="text-center"><td colspan="3" class="text-right">Nº total de créditos teóricos del Plan de Estudios</td><td><strong>'.$tot_creditos.'</strong></td><td>No. de alumnos que abandonan</td><td><strong id="total-abandonan">'.$tot_abandona.'</strong></td></tr>
                            <tr class="text-center"><td colspan="3" class="text-right">Nº de alumnos no matriculados en el año de graduación o el siguiente</td><td><strong id="nro_alumnos_no_matriculados"></strong></td></tr>
                        </tbody>
                    </table>';
                    
                    $salida2 = '';
                    //Nº total de créditos superados (NO los adaptados, convalidados o reconocidos)
                    foreach($alumnos as $alumno){
                        $salida2 .= '<tr>
                                        <td>'.$alumno->strNombre.'</td>
                                        <td>'.$alumno->strApellidos.'</td>
                                        <td class="text-center">'.$credito->creditos.'</td>
                                        '.$this->td_2($alumno->numIdAlumno,$request->periodo).'
                                    </tr>';
                    }                    
                    $table2 = '<table id="table-2" class="table table-responsive-sm table-hover table-outline mb-0" style="width: 100%">                        
                                    <thead class="thead-light">
                                        <tr>
                                            <th rowspan="2" style="width: 10%" class="text-center">Nombre</th>
                                            <th rowspan="2" style="width: 10%" class="text-center">Apellidos</th>
                                            <th rowspan="2" style="width: 10%" class="text-center">Nº Créditos Teóricos del Plan de estudios</th> 
                                            '.$header['fila2'].'
                                            <th rowspan="2" class="text-center">Total</th>
                                        </tr>
                                        <tr>                                
                                        '.$header['fila1'].'
                                        </tr>
                                    </thead>
                                    <tbody id="body-table-2">
                                        '.$salida2.'
                                        <tr class="text-center"><td colspan="3" class="text-right">Créditos anuales</td><td id="table_2_ano_1"></td><td id="table_2_ano_2"></td><td id="table_2_ano_3"></td><td id="table_2_ano_4"></td><td id="table_2_ano_5"></td><td id="table_2_ano_6"></td><td id="table_2_total"></td></tr>                        
                                    </tbody>
                                </table>';

                    $salida3 = '';
                    //Nº total de créditos presentados a examen (No entran NP, Convalidados, Incompleto)
                    foreach($alumnos as $alumno){
                        $salida3 .= '<tr>
                                        <td>'.$alumno->strNombre.'</td>
                                        <td>'.$alumno->strApellidos.'</td>
                                        <td class="text-center">'.$credito->creditos.'</td>
                                        '.$this->td_3($alumno->numIdAlumno,$request->periodo).'
                                    </tr>';
                    }                    
                    $table3 = '<table id="table-3" class="table table-responsive-sm table-hover table-outline mb-0" style="width: 100%">                        
                                    <thead class="thead-light">
                                        <tr>
                                            <th rowspan="2" style="width: 10%" class="text-center">Nombre</th>
                                            <th rowspan="2" style="width: 10%" class="text-center">Apellidos</th>
                                            <th rowspan="2" style="width: 10%" class="text-center">Nº Créditos Teóricos del Plan de estudios</th> 
                                            '.$header['fila2'].'
                                            <th rowspan="2" class="text-center">Total</th>
                                        </tr>
                                        <tr>                                
                                        '.$header['fila1'].'
                                        </tr>
                                    </thead>
                                    <tbody id="body-table-3">
                                        '.$salida3.'  
                                        <tr class="text-center"><td colspan="3" class="text-right">Créditos anuales</td><td id="table_3_ano_1"></td><td id="table_3_ano_2"></td><td id="table_3_ano_3"></td><td id="table_3_ano_4"></td><td id="table_3_ano_5"></td><td id="table_3_ano_6"></td><td id="table_3_total"></td></tr>
                                    </tbody>
                                </table>';

        return response()->json(array('success' => true, 'message' => 'Tasas indicadores creadas correctamente.', 'table1' =>  $table1, 'table2' =>  $table2, 'table3' =>  $table3, 'nro_total_creditos' => $tot_creditos));
    }

    public function td_3($idAlumno,$columnas){
        $ano = explode('-',$columnas);
        $desde = (int)$ano[0];
        $hasta = (int)$ano[1];
        $salida = '';
        $creditos_array = [];
        $cretidos_sum = 0;
        $total_creditos = 0;
        for($desde;$desde<=$hasta;$desde++){
            $desde2 = $desde+1;
            $periodo = $desde.'-'.$desde2;
            // Todas las calificaciones Mayor o igual a 5 y que no estén convalidadas
            $creditos = Fichas_alumnos::select('asignaturas.codigo','credito')
                    ->join('cursos_academicos','cursos_academicos.numIdCursoAcademico','fichas_alumnos.numIdCursoAcademico')
                    ->join('asignaturas','asignaturas.numIdAsignatura','fichas_alumnos.numIdAsignatura')
                    ->join('pensun_estudio','pensun_estudio.idAsig','asignaturas.codigo')                    
                    ->where('strDescripcion',$periodo)
                    ->where('fichas_alumnos.numIdAlumno',$idAlumno)
                    ->where('fichas_alumnos.numNota','>=',5) // que Notas sea mayor o igual 5
                    ->whereNotIn('fichas_alumnos.numIdCalificacion', [215,1,238])  //Que la nota no este 215 => convalidada, 1 => NP, 238 => Incompletos
                    ->get();
            foreach($creditos as $credito){
                if (!in_array(trim($credito->codigo), $creditos_array)) {
                    $cretidos_sum += (int)$credito->credito;                    
                }
                array_push($creditos_array,trim($credito->codigo));
            }
            
            $salida .= '<td class="text-center">'.$cretidos_sum.'</td>';
            $total_creditos += $cretidos_sum;
            $cretidos_sum = 0;
            $creditos_array = [];
        }
        $salida .= '<td class="text-center"><strong>'.$total_creditos.'</strong></td>';
        
       return $salida;
    }

    public function td_2($idAlumno,$columnas){
        $ano = explode('-',$columnas);
        $desde = (int)$ano[0];
        $hasta = (int)$ano[1];
        $salida = '';
        $creditos_array = [];
        $cretidos_sum = 0;
        $total_creditos = 0;
        for($desde;$desde<=$hasta;$desde++){
            $desde2 = $desde+1;
            $periodo = $desde.'-'.$desde2;
            // Todas las calificaciones Mayor o igual a 5 y que no estén convalidadas
            $creditos = Fichas_alumnos::select('asignaturas.codigo','credito')
                    ->join('cursos_academicos','cursos_academicos.numIdCursoAcademico','fichas_alumnos.numIdCursoAcademico')
                    ->join('asignaturas','asignaturas.numIdAsignatura','fichas_alumnos.numIdAsignatura')
                    ->join('pensun_estudio','pensun_estudio.idAsig','asignaturas.codigo')                    
                    ->where('strDescripcion',$periodo)
                    ->where('fichas_alumnos.numIdAlumno',$idAlumno)
                    ->where('fichas_alumnos.numNota','>=',5) // que Notas sea mayor o igual 5
                    ->whereNotIn('fichas_alumnos.numIdCalificacion', [215])  //Que la nota no este convalidada
                    ->get();
            foreach($creditos as $credito){
                if (!in_array(trim($credito->codigo), $creditos_array)) {
                    $cretidos_sum += (int)$credito->credito;                    
                }
                array_push($creditos_array,trim($credito->codigo));
            }
            
            $salida .= '<td class="text-center">'.$cretidos_sum.'</td>';
            $total_creditos += $cretidos_sum;
            $cretidos_sum = 0;
            $creditos_array = [];
        }
        $salida .= '<td class="text-center"><strong>'.$total_creditos.'</strong></td>';
        
       return $salida;
    }

    public function td($idAlumno,$columnas){
        $ano = explode('-',$columnas);
        $desde = (int)$ano[0];
        $hasta = (int)$ano[1];
        $salida = '';
        $creditos_array = [];
        $cretidos_sum = 0;
        $total_creditos = 0;
        $abandona = [];
        for($desde;$desde<=$hasta;$desde++){
            $desde2 = $desde+1;
            $periodo = $desde.'-'.$desde2;
            $creditos = Fichas_alumnos::select('asignaturas.codigo','credito')
                    ->join('cursos_academicos','cursos_academicos.numIdCursoAcademico','fichas_alumnos.numIdCursoAcademico')
                    ->join('asignaturas','asignaturas.numIdAsignatura','fichas_alumnos.numIdAsignatura')
                    ->join('pensun_estudio','pensun_estudio.idAsig','asignaturas.codigo')                    
                    ->where('strDescripcion',$periodo)
                    ->where('fichas_alumnos.numIdAlumno',$idAlumno)->get();
            foreach($creditos as $credito){
                if (!in_array(trim($credito->codigo), $creditos_array)) {
                    $cretidos_sum += (int)$credito->credito;                    
                }
                array_push($creditos_array,trim($credito->codigo));
            }

            if ($cretidos_sum == 0){
                array_push($abandona,1);
            }
            
            $salida .= '<td class="text-center">'.$cretidos_sum.'</td>';
            $total_creditos += $cretidos_sum;
            $cretidos_sum = 0;
            $creditos_array = [];
        }
        $salida .= '<td class="text-center"><strong>'.$total_creditos.'</strong></td>';
        
       return [
                'resultado_1' => $salida,
                'total_abandona' => count($abandona)
                ];
    }

    public function th($columnas){
        $ano = explode('-',$columnas);
        $desde = (int)$ano[0];
        $hasta = (int)$ano[1];
        $salida = '';
        $salida1 = '';
        $i = 1;
        for($desde;$desde<=$hasta;$desde++){
            $desde2 = $desde+1;
            $salida .= '<th class="text-center">'.$desde.'-'.$desde2.'</th>';
            $salida1 .= '<th class="text-center">Año '.$i++.'</th>';
        }
        return ['fila1' => $salida,
                'fila2' => $salida1];
    }

    public function imprimirPdfIndicadoresResumen(Request $request){
        $data = $request;
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-tasas-indicadores', $data)->setPaper('A4', 'portrait')->save($rutaFile);   
        return response()->json(array('success' => true, 'message' => 'Pdf generado exitosamente', 'data' => $ruta, '' => ''));
    }

    public function gradoSatisfaccion()
    {        
        return view('satisfaccion-grado.modulo-grado-satisfaccion');
    }

    public function subirFicheroGradoSatisfaccion(Request $request){
        $file   = $request->file('file');
        $ficheroCSV = $file->getClientOriginalName();        
        \Storage::disk('local')->put($ficheroCSV,  \File::get($file));

        switch ($request->grupo) {
            case 'profesorado':
                $ficheroGenerado = $this->generaGradoSatisfaccionProfesorado($request,$ficheroCSV);
                break;
            case 'alumnado':
                $ficheroGenerado = $this->generaGradoSatisfaccionAlumnado($request,$ficheroCSV);
                break; 
            case 'pas':
                $ficheroGenerado = $this->generaGradoSatisfaccionPas($request,$ficheroCSV);
                break;
            case 'otros':
                $ficheroGenerado = $this->generaGradoSatisfaccionOtros($request,$ficheroCSV);
                break;          
        }        
    
        return $ficheroGenerado;

    }

    function generaGradoSatisfaccionOtros($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_otros.php";

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/otros-grado-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelOtros($request->periodo);
            $nameFile = \uniqid('grado-satifaccion-otros-').'.xlsx';
        }else{
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/otros-master-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelOtros($request->periodo);
            $nameFile = \uniqid('master-satifaccion-otros-').'.xlsx';
        }        
        
        $respondidas = respondidasOtros($ficheroCSV);
        
        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_otros = preguntas_1_otros($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_otros['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][1], $preguntas_1_otros['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][2], $preguntas_1_otros['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][3], $preguntas_1_otros['item4']); 
        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_otros = preguntas_2_otros($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_otros['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][1], $preguntas_2_otros['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][2], $preguntas_2_otros['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][3], $preguntas_2_otros['item4']); 
        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_otros = preguntas_3_otros($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_otros['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][1], $preguntas_3_otros['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][2], $preguntas_3_otros['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][3], $preguntas_3_otros['item4']); 
        /*  
                    PREGUNTA 4
        */        
        $preguntas_4_otros = preguntas_4_otros($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][0], $preguntas_4_otros['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][1], $preguntas_4_otros['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][2], $preguntas_4_otros['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][3], $preguntas_4_otros['item4']);         
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    function generaGradoSatisfaccionPas($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_pas.php";

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/pas-grado-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelPas($request->periodo);
            $nameFile = \uniqid('grado-satifaccion-pas-').'.xlsx';
        }else{
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/pas-master-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelPas($request->periodo);
            $nameFile = \uniqid('master-satifaccion-pas-').'.xlsx';
        }        
        
        $respondidas = respondidasPas($ficheroCSV);
        $worksheet->setCellValue($posicionExcel['respondidas'], $respondidas); //Preguntas respondidas
        $worksheet->setCellValue($posicionExcel['personal'], $request->personal); //Personal
        
        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_pas = preguntas_1_pas($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_pas['item1']); 
        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_pas = preguntas_2_pas($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_pas['item1']);     
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][1], $preguntas_2_pas['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][2], $preguntas_2_pas['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][3], $preguntas_2_pas['item4']);
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][4], $preguntas_2_pas['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][5], $preguntas_2_pas['item6']); 
        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_pas = preguntas_3_pas($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_pas['item1']);     
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][1], $preguntas_3_pas['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][2], $preguntas_3_pas['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][3], $preguntas_3_pas['item4']);
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][4], $preguntas_3_pas['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][5], $preguntas_3_pas['item6']);             
        # Item 7
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][6], $preguntas_3_pas['item7']);     
        # Item 8
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][7], $preguntas_3_pas['item8']);
        /*  
                    PREGUNTA 4
        */        
        $preguntas_4_pas = preguntas_4_pas($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][0], $preguntas_4_pas['item1']);     
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][1], $preguntas_4_pas['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][2], $preguntas_4_pas['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][3], $preguntas_4_pas['item4']);
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][4], $preguntas_4_pas['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][5], $preguntas_4_pas['item6']);             
        # Item 7
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][6], $preguntas_4_pas['item7']);     
        # Item 8
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][7], $preguntas_4_pas['item8']);
         # Item 9
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][8], $preguntas_4_pas['item9']);     
        
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    function generaGradoSatisfaccionAlumnado($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_alumnado.php";

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/estudiante-profesorado-recursos-grado-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelAlumnado($request->periodo);
            $nameFile = \uniqid('grado-satifaccion-alumnado-').'.xlsx';
        }else{
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/estudiante-profesorado-recursos-master-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelAlumnado($request->periodo);
            $nameFile = \uniqid('master-satifaccion-alumnado-').'.xlsx';
        }        
        
        $respondidas = respondidasAlumnado($ficheroCSV);
        
        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_alumnado = preguntas_1_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_alumnado['item1']);                
        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_alumnado = preguntas_2_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_alumnado['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][1], $preguntas_2_alumnado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][2], $preguntas_2_alumnado['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][3], $preguntas_2_alumnado['item4']);     
        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_alumnado = preguntas_3_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_alumnado['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][1], $preguntas_3_alumnado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][2], $preguntas_3_alumnado['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][3], $preguntas_3_alumnado['item4']);           
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][4], $preguntas_3_alumnado['item5']);
        /*  
                    PREGUNTA 4
        */        
        $preguntas_4_alumnado = preguntas_4_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][0], $preguntas_4_alumnado['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][1], $preguntas_4_alumnado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][2], $preguntas_4_alumnado['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][3], $preguntas_4_alumnado['item4']);                  
        /*  
                    PREGUNTA 5
        */        
        $preguntas_5_alumnado = preguntas_5_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_quinta_pregunta'][0], $preguntas_5_alumnado['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_quinta_pregunta'][1], $preguntas_5_alumnado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_quinta_pregunta'][2], $preguntas_5_alumnado['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_quinta_pregunta'][3], $preguntas_5_alumnado['item4']);
        /*  
                    PREGUNTA 6
        */        
        $preguntas_6_alumnado = preguntas_6_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][0], $preguntas_6_alumnado['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][1], $preguntas_6_alumnado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][2], $preguntas_6_alumnado['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][3], $preguntas_6_alumnado['item4']);
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][4], $preguntas_6_alumnado['item5']);   
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][5], $preguntas_6_alumnado['item6']); 
        # Item 7
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][6], $preguntas_6_alumnado['item7']); 
        # Item 8
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][7], $preguntas_6_alumnado['item8']);
        # Item 9
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][8], $preguntas_6_alumnado['item9']);
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    function generaGradoSatisfaccionProfesorado($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_profesorado.php";

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/profesorado-grado-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelProfesorado($request->periodo);
            $nameFile = \uniqid('profesorado-grado-satisfaccion-').'.xlsx';
        }else{ //Master
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/profesorado-master-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelProfesorado($request->periodo);
            $nameFile = \uniqid('profesorado-master-satisfaccion-').'.xlsx';
        }        
        
        $respondidas = respondidas($ficheroCSV);
        $worksheet->setCellValue($posicionExcel['respondidas'], $respondidas); //Preguntas respondidas
        $worksheet->setCellValue($posicionExcel['profesores'], $request->profesores); //Profesores
        $worksheet->setCellValue($posicionExcel['asignaturas'], $request->asignaturas); //Asignaturas

        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_profesorado = preguntas_1_profesorado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_profesorado['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][1], $preguntas_1_profesorado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][2], $preguntas_1_profesorado['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][3], $preguntas_1_profesorado['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][4], $preguntas_1_profesorado['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][5], $preguntas_1_profesorado['item6']); 

        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_profesorado = preguntas_2_profesorado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_profesorado['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][1], $preguntas_2_profesorado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][2], $preguntas_2_profesorado['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][3], $preguntas_2_profesorado['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][4], $preguntas_2_profesorado['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][5], $preguntas_2_profesorado['item6']); 
        # Item 7
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][6], $preguntas_2_profesorado['item7']); 
        # Item 8
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][7], $preguntas_2_profesorado['item8']); 
        # Item 9
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][8], $preguntas_2_profesorado['item9']);
        # Item 10
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][9], $preguntas_2_profesorado['item10']);  
        # Item 11
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][10], $preguntas_2_profesorado['item11']); 
        # Item 12
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][11], $preguntas_2_profesorado['item12']); 
        # Item 13
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][12], $preguntas_2_profesorado['item13']); 

        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_profesorado = preguntas_3_profesorado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_profesorado['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][1], $preguntas_3_profesorado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][2], $preguntas_3_profesorado['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][3], $preguntas_3_profesorado['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][4], $preguntas_3_profesorado['item5']);    
        
        /*  
                    PREGUNTA 4
        */        
        $preguntas_4_profesorado = preguntas_4_profesorado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][0], $preguntas_4_profesorado['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][1], $preguntas_4_profesorado['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][2], $preguntas_4_profesorado['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][3], $preguntas_4_profesorado['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][4], $preguntas_4_profesorado['item5']);    

                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

}
