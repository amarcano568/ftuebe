<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Tipo_estudios;
use App\Fichas_alumnos;
use App\Grupos;
use App\Matriculas;
use App\Matriculas_grupos;
use App\Informes_finales;
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
        $salida .= '<td class="text-center"><strong>'.number_format($total_creditos, 0, ',', '.').'</strong></td>';
        
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
        $salida .= '<td class="text-center"><strong>'.number_format($total_creditos, 0, ',', '.').'</strong></td>';
        
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
        $salida .= '<td class="text-center"><strong>'.number_format($total_creditos, 0, ',', '.').'</strong></td>';
        
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
            case 'empleadores':
                $ficheroGenerado = $this->generaGradoSatisfaccionEmpleadores($request,$ficheroCSV);
                break;        
            case 'egresados':
                $ficheroGenerado = $this->generaGradoSatisfaccionEgresados($request,$ficheroCSV);
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

        $worksheet->setCellValue('B3', $request->periodo);
        
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

        $worksheet->setCellValue('B4', $request->periodo); //Período
        
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
        // /*  
        //             PREGUNTA 3
        // */        
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
        // /*  
        //             PREGUNTA 4
        // */        
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
        # Item 10
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][9], $preguntas_4_pas['item10']);     
        
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    function generaGradoSatisfaccionAlumnado($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_alumnado.php";

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/alumnado-grado-satisfaccion.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelAlumnado($request->periodo);
            $nameFile = \uniqid('grado-satifaccion-alumnado-').'.xlsx';
        }else{
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/alumnado-master-satisfaccion-original.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelAlumnado($request->periodo);
            $nameFile = \uniqid('master-satifaccion-alumnado-').'.xlsx';
        }        
        
        $respondidas = respondidasAlumnado($ficheroCSV);

        $worksheet->setCellValue('B3', $request->periodo); //Período

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
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][5], $preguntas_3_alumnado['item6']);
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
         /*  
                    PREGUNTA 7
        */        
        $preguntas_7_alumnado = preguntas_7_alumnado($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_septima_pregunta'][0], $preguntas_7_alumnado['item1']);
        
        #######################################################################
        #####################      Encuestas respondidas ######################
        #######################################################################
        $encuestas_respondidas = encuestas_respondidas($ficheroCSV);
        
        $fecha = \explode("-",$request->periodo);
        $fechaInicio = $fecha[0].'-01-09 00:00:00'; 
        $fechaFin = $fecha[1].'-08-31 29:59:00';
        $data = Grupos::where('fecFechaInicio', '>=', $fechaInicio)->where('fecFechaFinalizacion', '<=', $fechaFin)->get();
        $primero = 0;$segundo = 0;$tercero = 0;$cuarto = 0;$master = 0;$bienal = 0;
        foreach($data as $item){
            if ($item->numIdTipoGrupo == 4){
                $primero += $item->numAlumnos;
            }else if ($item->numIdTipoGrupo == 5){
                $segundo += $item->numAlumnos;
            }else if ($item->numIdTipoGrupo == 7){
                $tercero += $item->numAlumnos;
            }else if ($item->numIdTipoGrupo == 9){
                $cuarto += $item->numAlumnos;
            }else if ($item->numIdTipoGrupo == 17){
                $master += $item->numAlumnos;
            }else if ($item->numIdTipoGrupo == 29){
                $bienal += $item->numAlumnos;
                $tipo = $this->matriculaGrupo($item->numIdGrupo, $tercero, $cuarto);
            }
        }

        if ($request->tipo_estudio == 'grado-oficial'){  
            ############################################
            # Encuestas respondidas.
            #Alumnos 1er año
            $worksheet->setCellValue('I16', $encuestas_respondidas['primero']);
            #Alumnos 2do año
            $worksheet->setCellValue('I17', $encuestas_respondidas['segundo']);
            #Alumnos 3er año
            $worksheet->setCellValue('I18', $encuestas_respondidas['tercero']);
            #Alumnos 4to año
            $worksheet->setCellValue('I19', $encuestas_respondidas['cuarto']);

            ############################################
            # Previstas
            #Alumnos 1er año
            $worksheet->setCellValue('G16', $primero);
            #Alumnos 2do año
            $worksheet->setCellValue('G17', $segundo);
            #Alumnos 3er año
            $worksheet->setCellValue('G18', $tercero);
            #Alumnos 4to año
            $worksheet->setCellValue('G19', $cuarto);

            ############################################
            # Encuestas respondidas
            #Alumnos 1er año
            $worksheet->setCellValue('J16', $request->grado_1);
            #Alumnos 2do año
            $worksheet->setCellValue('J17', $request->grado_2);
            #Alumnos 3er año
            $worksheet->setCellValue('J18', $request->grado_3);
            #Alumnos 4to año
            $worksheet->setCellValue('J19', $request->grado_4);

            ############################################
            # Alumnos / Cursos
            #Alumnos 1er año
            $worksheet->setCellValue('E16', $request->grado_1_alumno_cruso);
            #Alumnos 2do año
            $worksheet->setCellValue('E17', $request->grado_2_alumno_curso);
            #Alumnos 3er año
            $worksheet->setCellValue('E18', $request->grado_3_alumno_curso);
            #Alumnos 4to año                                                
            $worksheet->setCellValue('E19', $request->grado_4_alumno_curso);
        }else{
            ############################################
            # Alumnos / Cursos
            #Alumnos 1er año
            $worksheet->setCellValue('E16', $request->grado_1_alumno_cruso);
            ############################################
            # Previstas
            #Alumnos 1er año
            $worksheet->setCellValue('G16', $master);
            # Encuestas respondidas.
            #Alumnos 1er año
            $worksheet->setCellValue('H16', $encuestas_respondidas['primero']);
            ############################################
            # Encuestas por curso            
            #Alumnos 1er año
            $worksheet->setCellValue('J16', $request->grado_1);            
        }
                            
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        /***********************************************
            Se guarda la información para informe final
        ************************************************/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($nameFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $dato1 = $worksheet->getCell('L4')->getCalculatedValue(); //Pregunta 1
        $dato2 = $worksheet->getCell('L5')->getCalculatedValue(); //Pregunta 2   
        $dato3 = $worksheet->getCell('L6')->getCalculatedValue(); //Pregunta 3
        $dato4 = $worksheet->getCell('L7')->getCalculatedValue(); //Pregunta 4   
        $dato5 = $worksheet->getCell('L8')->getCalculatedValue(); //Pregunta 5
        $dato6 = $worksheet->getCell('L9')->getCalculatedValue(); //Pregunta 6   
        $dato7 = $worksheet->getCell('L10')->getCalculatedValue(); //Pregunta 7

        if ($request->tipo_estudio == 'grado-oficial'){ 
            $dato8 = $worksheet->getCell('I20')->getCalculatedValue(); //Encuestas respondidas
            $dato9 = $worksheet->getCell('E20')->getCalculatedValue(); //nº alumnos  /curso
            $dato10 = $worksheet->getCell('J21')->getCalculatedValue(); //Índice de participación general
            $dato11 = $worksheet->getCell('E16')->getCalculatedValue(); //Primero
            $dato12 = $worksheet->getCell('E17')->getCalculatedValue(); //Segundo
            $dato13 = $worksheet->getCell('E18')->getCalculatedValue(); //Tercero
            $dato14 = $worksheet->getCell('E19')->getCalculatedValue(); //Cuarto
        }else{
            $dato8 = $worksheet->getCell('H16')->getCalculatedValue(); //Encuestas respondidas            
            $dato9 = $worksheet->getCell('E16')->getCalculatedValue(); //nº alumnos  /curso
            $dato10 = $worksheet->getCell('J18')->getCalculatedValue(); //Índice de participación general
            $dato11 = 0; //Primero
            $dato12 = 0; //Segundo
            $dato13 = 0; //Tercero
            $dato14 = 0; //Cuarto
        }
       
        $data = [];                       
        $data['dato1']      =  $dato1*100;
        $data['dato2']      =  $dato2*100;
        $data['dato3']      =  $dato3*100;
        $data['dato4']      =  $dato4*100;
        $data['dato5']      =  $dato5*100;
        $data['dato6']      =  $dato6*100;
        $data['dato7']      =  $dato7*100;
        $data['dato8']      =  $dato8;
        $data['dato9']      =  $dato9;
        $data['dato10']     =  $dato10;
        $data['dato11']     =  $dato11;
        $data['dato12']     =  $dato12;
        $data['dato13']     =  $dato13;
        $data['dato14']     =  $dato14;
      
        $exists = Informes_finales::updateOrCreate([
            'tipo' => 'alumnos',
            'estudio' => $request->tipo_estudio,
            'periodo' => $request->periodo,
        ], $data);  

        return $nameFile;
    }

    function matriculaGrupo($numIdGrupo, $tercero, $cuarto){
        $matriculas_grupos = Matriculas_grupos::where('numIdMatriculaGrupo', $numIdGrupo)->get();
        foreach($matriculas_grupos as $matricula_grupo){
            $matricula = Matriculas::find($matricula_grupo->numIdMatricula);
            if($matricula->numIdTipoMatricula == 4){
                $tercero++;
            }else if($matricula->numIdTipoMatricula == 5){
                $cuarto++;
            }
        }  
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

        $worksheet->setCellValue('B3', $request->periodo);
        
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

        /***********************************************
            Se guarda la información para informe final
        ************************************************/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($nameFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $pregunta1 = $worksheet->getCell('L4')->getCalculatedValue(); //Pregunta 1
        $pregunta2 = $worksheet->getCell('L5')->getCalculatedValue(); //Pregunta 2  
        $pregunta3 = $worksheet->getCell('L7')->getCalculatedValue(); //Pregunta 3
        $pregunta4 = $worksheet->getCell('L8')->getCalculatedValue(); //Pregunta 4  

        $data = [];                       
        $data['dato7']      =  (($pregunta1+$pregunta2+$pregunta3+$pregunta4)/4)*100;
        $periodo = explode('-',$request->periodo);
        $ano_inicial = (int)$periodo[1]-5;
        $periodos = $ano_inicial.'-'.$periodo[1];        
        $exists = Informes_finales::updateOrCreate([
            'tipo' => 'indicadores',
            'estudio' => $request->tipo_estudio,
            'periodo' => $periodos,
        ], $data);  

        return $nameFile;
    }

    function generaGradoSatisfaccionEmpleadores($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_empleadores.php";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/empleadores-grado-satisfaccion.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();
        $posicionExcel = posicionEnElExcelEmpleadores();
        $nameFile = \uniqid('empleadores-grado-satisfaccion-').'.xlsx';
                
        $worksheet->setCellValue('B3', $request->periodo);
        
        $respondidas = respondidas($ficheroCSV);
        $worksheet->setCellValue($posicionExcel['respondidas'], $respondidas); //Preguntas respondidas
        $worksheet->setCellValue($posicionExcel['empleadores'], $request->empleadores); //Empleadores

        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_empleadores = preguntas_1_empleadores($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_empleadores['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][1], $preguntas_1_empleadores['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][2], $preguntas_1_empleadores['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][3], $preguntas_1_empleadores['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][4], $preguntas_1_empleadores['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][5], $preguntas_1_empleadores['item6']); 
        # Item 7
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][6], $preguntas_1_empleadores['item7']);  
        # Item 8
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][7], $preguntas_1_empleadores['item8']); 
        # Item 9
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][8], $preguntas_1_empleadores['item9']); 
        # Item 10
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][9], $preguntas_1_empleadores['item10']);
        # Item 11
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][10], $preguntas_1_empleadores['item11']);
        # Item 12
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][11], $preguntas_1_empleadores['item12']);

        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_empleadores = preguntas_2_empleadores($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_empleadores['item1']); 
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][1], $preguntas_2_empleadores['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][2], $preguntas_2_empleadores['item3']);
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][3], $preguntas_2_empleadores['item4']);  
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][4], $preguntas_2_empleadores['item5']); 
        # Item 6
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][5], $preguntas_2_empleadores['item6']);        

        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_empleadores = preguntas_3_empleadores($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_empleadores['item1']); 
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    function generaGradoSatisfaccionEgresados($request,$ficheroCSV){
        
        include_once "satisfaccion/satisfaccion_egresados.php";        

        if ($request->tipo_estudio == 'grado-oficial'){
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/egresados-grado-satisfaccion-grado-oficial.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelEgresados();
            $nameFile = \uniqid('egresados-grado-satisfaccion-').'.xlsx';
        }else{
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/egresados-grado-satisfaccion-master.xlsx");
            $worksheet = $spreadsheet->getActiveSheet();
            $posicionExcel = posicionEnElExcelEgresados();
            $nameFile = \uniqid('egresados-master-').'.xlsx';
        }   

                
        $worksheet->setCellValue('B3', $request->periodo);
        
        $respondidas = respondidas($ficheroCSV);
        $worksheet->setCellValue($posicionExcel['respondidas'], $respondidas); //Preguntas respondidas
        $worksheet->setCellValue($posicionExcel['egresados'], $request->ExAlumnos); //ExAlumnos

        /*  
                    PREGUNTA 1
        */        
        $preguntas_1_egresados = preguntas_1_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_primera_pregunta'][0], $preguntas_1_egresados['item1']);        

        /*  
                    PREGUNTA 2
        */        
        $preguntas_2_egresados = preguntas_2_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_segunda_pregunta'][0], $preguntas_2_egresados['item1']);               

        /*  
                    PREGUNTA 3
        */        
        $preguntas_3_egresados = preguntas_3_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_tercera_pregunta'][0], $preguntas_3_egresados['item1']); 

        /*  
                    PREGUNTA 4
        */        
        $preguntas_4_egresados = preguntas_4_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][0], $preguntas_4_egresados['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][1], $preguntas_4_egresados['item2']); 
        # Item 3
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][2], $preguntas_4_egresados['item3']); 
        # Item 4
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][3], $preguntas_4_egresados['item4']);           
        # Item 5
        $worksheet->setCellValue($posicionExcel['pos_items_cuarta_pregunta'][4], $preguntas_4_egresados['item5']);

        /*  
                    PREGUNTA 5
        */        
        $preguntas_5_egresados = preguntas_5_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_quinta_pregunta'][0], $preguntas_5_egresados['item1']);

        /*  
                    PREGUNTA 6
        */        
        $preguntas_6_egresados = preguntas_6_egresados($ficheroCSV,$respondidas);
        # Item 1
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][0], $preguntas_6_egresados['item1']);   
        # Item 2
        $worksheet->setCellValue($posicionExcel['pos_items_sexta_pregunta'][1], $preguntas_6_egresados['item2']); 
                    
        $writer = new Xlsx($spreadsheet);   
        $writer->save($nameFile);

        return $nameFile;
    }

    public function informeFinal()
    {        
        return view('informe-final.informe-final');
    }

    public function guardarIndicadoresPrincipales(Request $request){

        $data = [];                       
        $data['tipo']       = 'indicadores';
        $data['estudio']    =  $request->estudio;
        $data['periodo']    =  $request->periodo;
        $data['dato1']      =  $request->tasa_graduacion;
        $data['dato2']      =  $request->tasa_abandono;
        $data['dato3']      =  $request->tasa_eficiencia;
        $data['dato4']      =  $request->tasa_rendimiento;

        $exists = Informes_finales::updateOrCreate([
            'tipo' => 'indicadores',
            'estudio' => $request->estudio,
            'periodo' => $request->periodo,
        ], $data);  

        return response()->json(array('success' => true, 'message' => 'indicadores tasas', 'data' => $exists, ''));
        
    }

    public function generarInformeFinal(Request $request){
                 
            switch ($request->informe) {
                case 'indicadores':
                    $informe = Informes_finales::where(['tipo'=>$request->informe,'estudio'=>$request->tipo_estudio,'periodo'=>$request->cohorte])->first();
                    if($informe === NULL){
                        return response()->json(array('success' => false, 'message' => 'No existe información generada para este informe (previamente debe generar las tasas y el grado de sastifacción correspondiente)'));
                    }
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/indicadores-tasas.xlsx");
                    $worksheet = $spreadsheet->getActiveSheet();
                    $nameFile = \uniqid('indicadores-tasas-').'.xlsx'; 
        
                    $worksheet->setCellValue('B16', 'La Facultad de Teología UEBE se esfuerza en ofrecer una formación de calidad y para optimizar y afianzar los sistemas de garantía de la calidad, por lo que realiza anualmente numerosas encuestas de satisfacción, tanto con la formación recibida como con el profesorado, la calidad de los servicios, y las prácticas, entre otros. Los datos obtenidos de esta evaluación son tratados para elaborar los indicadores y tasas conforme a la definición de SIIU. Los datos presentados a continuación responden a los indicadores más representativos del curso '.$request->cohorte.'  en el Grado en Teología:');        
                    $worksheet->setCellValue('B18', 'TASAS CORRESPONDIENTES A LA COHORTE '.$request->cohorte);
                    $worksheet->setCellValue('K19', $informe->dato1.'%');
                    $worksheet->setCellValue('K20', $informe->dato2.'%');
                    $worksheet->setCellValue('K21', $informe->dato3.'%');
                    $worksheet->setCellValue('K22', $informe->dato4.'%');
                    $worksheet->setCellValue('K23', $informe->dato5.'%');
                    $worksheet->setCellValue('K24', $informe->dato6.'%');
                    $worksheet->setCellValue('K25', $informe->dato7.'%');
                  break;
                case 'alumnos':
                    $informe = Informes_finales::where(['tipo'=>$request->informe,'estudio'=>$request->tipo_estudio,'periodo'=>$request->periodo])->first();
                    if($informe === NULL){
                        return response()->json(array('success' => false, 'message' => 'No existe información generada para este informe (previamente debe generar las tasas y el grado de sastifacción correspondiente)'));
                    }
                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("plantillas_satisfaccion/plantilla-informe-final-satisfaccion-grupo.xlsx");
                    $worksheet = $spreadsheet->getActiveSheet();
                    $nameFile = \uniqid('informe-final-satisfaccion-grupo-').'.xlsx'; 
        
                    if ($request->tipo_estudio == 'grado-oficial'){
                        $titulo = 'GRADO EN TEOLOGÍA';
                        $worksheet->setCellValue('D25', $informe->dato11);# PRIMERO
                        $worksheet->setCellValue('F25', $informe->dato12);# SEGUNDO 
                        $worksheet->setCellValue('H25', $informe->dato13);# TERCERO
                        $worksheet->setCellValue('F27', $informe->dato14);# CUARTO
                    }else{
                        $titulo = 'MASTER EN TEOLOGÍA';
                    }

                    $worksheet->setCellValue('C17', $titulo);
                    $worksheet->setCellValue('C19', 'ALUMNADO');

                    $worksheet->setCellValue('G21', $informe->dato8);# Nº CUESTIONARIOS CUMPLIMENTADOS
                    $worksheet->setCellValue('G22', $informe->dato9);# Nº DE ESTUDIANTES MATRICULADOS 
                    $worksheet->setCellValue('G23', $informe->dato10.'%');# TASA DE PARTICIPACIÓN 

                    

                    $worksheet->setCellValue('I32', $informe->dato1.'%');# pregunta 1
                    $worksheet->setCellValue('I33', $informe->dato2.'%');# pregunta 2
                    $worksheet->setCellValue('I34', $informe->dato3.'%');# pregunta 3
                    $worksheet->setCellValue('I35', $informe->dato4.'%');# pregunta 4
                    $worksheet->setCellValue('I36', $informe->dato5.'%');# pregunta 5
                    $worksheet->setCellValue('I37', $informe->dato6.'%');# pregunta 6
                    $worksheet->setCellValue('I38', $informe->dato7.'%');# pregunta 7
                  break;                
                
              }

            $writer = new Xlsx($spreadsheet);   
            $writer->save($nameFile);

            return response()->json(array('success' => true, 'message' => 'El informe se genero correctamente', 'data' => $informe, 'fichero' => $nameFile));
        
    }

}
