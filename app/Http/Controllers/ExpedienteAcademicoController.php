<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use App\Pensun_estudio;
use App\Fichas_alumnos;
use App\Asignaturas;
use App\Cursos_academicos;

class ExpedienteAcademicoController extends Controller
{
    

    public function expedienteAcademico(Request $request){
        $laguage = $request->language;

        $alumno = Alumnos::leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')->find($request->idAlumno);
        $programa = Pensun_estudio::join('asignaturas', 'pensun_estudio.idAsig', 'asignaturas.codigo')
        ->where('estudio',$request->estudio)->get();
        $curso1 = [];
        $curso2 = [];
        $curso3 = [];
        $curso4 = [];
        $mp_creditos_c1 = [];$mp_notas_c1 = [];
        $mp_creditos_c2 = [];$mp_notas_c2 = [];
        $mp_creditos_c3 = [];$mp_notas_c3 = [];
        $mp_creditos_c4 = [];$mp_notas_c4 = [];
        foreach($programa as $item){
            switch ($item->curso) {
                case 1:
                    $ficha = $this->ficha($request->idAlumno,$item->idAsig,$item->numIdAsignatura);                   
                    $cualitativa = $this->cualitativa($ficha['nota'],$request->language);
                    $color = $this->color($cualitativa);                  
                    array_push(
                        $curso1, [
                            'idAsig' => $item->idAsig, 
                            'materia' => $laguage == 'es' ? $item->materia : $item->class, 
                            'curso' => $ficha['curso'],
                            'credito' => $item->credito,
                            'nota' => $ficha['nota'],
                            'cualitativa' => $cualitativa,
                            'color' => $color,
                            'eeuu' => $this->eeuu($ficha['nota']),
                            ]
                    );
                    array_push($mp_creditos_c1,$item->credito);
                    array_push($mp_notas_c1,$ficha['nota']);
                    break;
                case 2:
                    $ficha = $this->ficha($request->idAlumno,$item->idAsig,$item->numIdAsignatura);                   
                    $cualitativa = $this->cualitativa($ficha['nota'],$request->language);
                    $color = $this->color($cualitativa);                  
                    array_push(
                        $curso2, [
                            'idAsig' => $item->idAsig, 
                            'materia' => $laguage == 'es' ? $item->materia : $item->class, 
                            'curso' => $ficha['curso'],
                            'credito' => $item->credito,
                            'nota' => $ficha['nota'],
                            'cualitativa' => $cualitativa,
                            'color' => $color,
                            'eeuu' => $this->eeuu($ficha['nota']),
                            ]
                    );
                    array_push($mp_creditos_c2,$item->credito);
                    array_push($mp_notas_c2,$ficha['nota']);
                    break;
                case 3:
                    $ficha = $this->ficha($request->idAlumno,$item->idAsig,$item->numIdAsignatura);                   
                    $cualitativa = $this->cualitativa($ficha['nota'],$request->language);
                    $color = $this->color($cualitativa);                  
                    array_push(
                        $curso3, [
                            'idAsig' => $item->idAsig, 
                            'materia' => $laguage == 'es' ? $item->materia : $item->class, 
                            'curso' => $ficha['curso'],
                            'credito' => $item->credito,
                            'nota' => $ficha['nota'],
                            'cualitativa' => $cualitativa,
                            'color' => $color,
                            'eeuu' => $this->eeuu($ficha['nota']),
                            ]
                    );
                    array_push($mp_creditos_c3,$item->credito);
                    array_push($mp_notas_c3,$ficha['nota']);
                    break;
                case 4:
                    $ficha = $this->ficha($request->idAlumno,$item->idAsig,$item->numIdAsignatura);                   
                    $cualitativa = $this->cualitativa($ficha['nota'],$request->language);
                    $color = $this->color($cualitativa);                  
                    array_push(
                        $curso4, [
                            'idAsig' => $item->idAsig, 
                            'materia' => $laguage == 'es' ? $item->materia : $item->class, 
                            'curso' => $ficha['curso'], 
                            'credito' => $item->credito,
                            'nota' => $ficha['nota'],
                            'cualitativa' => $cualitativa,
                            'color' => $color,
                            'eeuu' => $this->eeuu($ficha['nota']),
                            ]
                    );
                    array_push($mp_creditos_c4,$item->credito);
                    array_push($mp_notas_c4,$ficha['nota']);
                    break;
            }
        }
        $mp_c1 = $this->media_ponderada($mp_creditos_c1,$mp_notas_c1);
        $mp_c2 = $this->media_ponderada($mp_creditos_c2,$mp_notas_c2);
        $mp_c3 = $this->media_ponderada($mp_creditos_c3,$mp_notas_c3);
        $mp_c4 = $this->media_ponderada($mp_creditos_c4,$mp_notas_c4);

        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = base_path() . '/public/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;   

        $data = [
            'alumno' => $alumno,
            'curso1' => $curso1,
            'curso2' => $curso2,
            'curso3' => $curso3,
            'curso4' => $curso4,
            'mp_c1' => $mp_c1,
            'mp_c2' => $mp_c2,
            'mp_c3' => $mp_c3,
            'mp_c4' => $mp_c4,
            'estudio' => $request->estudio,
            'idAlumno' => $request->idAlumno,
            'language' => $request->language,
            'pdf' => $nameFilePdf,
            'title' => $this->title($request->language,$alumno,$request->estudio),
        ];
                
        \PDF::loadView('pdf.pdf-expediente-academico', $data)->setPaper('A4', 'portrait')->save($rutaFile);     
        return view('expediente-academico.gestion',$data);
    }

    public function title($lenguage,$alumno,$estudio){
        switch ($estudio) {
            case 'grado_oficial':
                $estudio = '';
                break;
            case 'master_grado_oficial':
                $estudio = '';
                break;
            case 'titulo_propio':
                $estudio = '';
                break;
            case 'master_titulo_propio':
                $estudio = '';
                break;
            }

        if ($lenguage == 'es'){
            $parrafo1 = 'Raquel Molina Becerra, secretaria académica de la Facultad Protestante de Teología UEBE, con títulos reconocidos a efectos civiles por el Real Decreto 1633/2011 de 14 de noviembre (BOE nº 276 de 16 de noviembre de 2011) e inscrita en el Registro Universitario de Centros y Títulos (RUCT) con el nº 28053204.';
            $parrafo2 = 'Que '.$alumno->strNombre.' '.$alumno->strApellidos.', con documento de identidad '.$alumno->documento.' '.$alumno->strNif.', ha cursado las asignaturas que conforman el programa de  Grado en Teología (título inscrito en el RUCT con el nº 9000003) que a continuación se detallan:';
            $parrafo3 = '1 crédito ECTS corresponde a 25 horas teóricas y prácticas - Sistema de calificación usado: 9-10 Sobresaliente, 7-8 Notable, 5-6 aprobado';
        }else{
            $parrafo1 = 'Raquel Molina Becerra, academic secretary of the Protestant Faculty of Theology of the UEBE, officially recognized by Royal Decree 1633/2011 of 14 November (BOE no. 276 of 16 November 2011) and registered in the Registrar of Universities, Schools and Degrees (RUCT) under number 28053204,';
            $parrafo2 = 'That'.$alumno->strNombre.' '.$alumno->strApellidos.', ID '.$alumno->documento.' '.$alumno->strNif.' , has completed the courses that make up the program _____________________________ (title registered in the RUCT under number 9000003), as is detailed below:';
            $parrafo3 = '1 ECTS credit corresponds to 25 hours of theory and practical work. Grading System used: 9-10 = excellent; 7-8 = good; 5-6 = passing ';
        }

        return [
            'parrafo1' => $parrafo1,
            'parrafo2' => $parrafo2,
            'parrafo3' => $parrafo3,
        ];
    }

    public function media_ponderada($creditos,$notas){  
        $n1 = count($creditos);
        $n2 = count($notas);      
        $soma_vp = 0;
        for ($i = 0; $i < $n1; $i++) {
            $soma_vp += $notas[$i] *$creditos[$i];
        }
        $soma_p = 0;
        foreach ($creditos as $p) {
            $soma_p += $p;
        }
        //a media
        if ($soma_vp == 0 or $soma_p == 0){
            return 0;
        }
        return $soma_vp / $soma_p;
    }

    public function ficha($idAlumno,$idAsig,$numIdAsignatura){
        $notas = Fichas_alumnos::select('numNota','strDescripcion')->where('numIdAlumno',$idAlumno)
        ->join('cursos_academicos', 'fichas_alumnos.numIdCursoAcademico', 'cursos_academicos.numIdCursoAcademico')
        ->where('numIdAsignatura',$numIdAsignatura)
        ->first();
        return [
            'nota' => $notas['numNota'],
            'curso' => $notas['strDescripcion'],
        ];
    }

    public function cualitativa($nota,$language){
        if((float)$nota <= 4.99){
            return $language == 'es' ? "Suspenso" : 'Suspense';
        }
        if((float)$nota <= 6.99){
            return $language == 'es' ? "Aprobado" : 'Approved';
        }
        if((float)$nota <= 8.99){
            return $language == 'es' ?  "Notable" : 'Remarkable';
        }
        if((float)$nota == 10){
            return $language == 'es' ?  "Mención de Honor" : 'Honorable Mention';
        }
        return $language == 'es' ?  "Sobresaliente" : 'Outstanding';
    }

    public function color($cualitativa){
        if($cualitativa == "Suspenso" or $cualitativa == 'Suspense'){
            return 'text-danger';
        }
        if($cualitativa == "Aprobado" or $cualitativa == 'Approved'){
            return 'text-secondary';
        }
        if($cualitativa == "Notable" or $cualitativa == 'Remarkable'){
            return 'text-warning';
        }
        if($cualitativa == "Mención de Honor" or $cualitativa == 'Honorable Mention'){
            return 'text-primary';
        }
        return "text-success";
    }

    public function eeuu($nota){
        if ((float)$nota <= 6){
            return "F";
        }
        if ((float)$nota >= 6 and (float)$nota<=6.29){
            return "D-";
        }
        if ((float)$nota >= 6.3 and (float)$nota<=6.69){
            return "D";
        }
        if ((float)$nota >= 6.7 and (float)$nota<=6.99){
            return "D+";
        }
        if ((float)$nota >= 7 and (float)$nota<=7.29){
            return "C-";
        }
        if ((float)$nota >= 7.3 and (float)$nota<=7.69){
            return "C";
        }
        if ((float)$nota >= 7.7 and (float)$nota<=7.99){
            return "C+";
        }
        if ((float)$nota >= 8 and (float)$nota<=8.29){
            return "B-";
        }
        if ((float)$nota >= 8.3 and (float)$nota<=8.69){
            return "B";
        }
        if ((float)$nota >= 8.7 and (float)$nota<=8.99){
            return "B+";
        }
        if ((float)$nota >= 9 and (float)$nota<=9.29){
            return "A";
        }
        if ((float)$nota >= 9.3){
            return "A+";
        }
       
    }

   

}
