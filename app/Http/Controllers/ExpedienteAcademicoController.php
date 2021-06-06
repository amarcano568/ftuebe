<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use App\Pensun_estudio;

class ExpedienteAcademicoController extends Controller
{
    
    public function expedienteAcademico(Request $request){
        
        $alumno = Alumnos::leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')->find($request->idAlumno);
        $programa = Pensun_estudio::where('estudio',$request->estudio)->get();
        $curso1 = [];
        $curso2 = [];
        $curso3 = [];
        $curso4 = [];
        foreach($programa as $item){
            switch ($item->curso) {
                case 1:
                    array_push(
                        $curso1, ['idAsig' => $item->idAsig, 'materia' => $item->materia, 'credito' => $item->credito]
                    );
                    break;
                case 2:
                    array_push(
                        $curso2, ['idAsig' => $item->idAsig, 'materia' => $item->materia, 'credito' => $item->credito]
                    );
                    break;
                case 3:
                    array_push(
                        $curso3, ['idAsig' => $item->idAsig, 'materia' => $item->materia, 'credito' => $item->credito]
                    );
                    break;
                case 4:
                    array_push(
                        $curso4, ['idAsig' => $item->idAsig, 'materia' => $item->materia, 'credito' => $item->credito]
                    );
                    break;
            }
        }

        $data = [
            'alumno' => $alumno,
            'curso1' => $curso1,
            'curso2' => $curso2,
            'curso3' => $curso3,
            'curso4' => $curso4,
        ];
        return view('expediente-academico.gestion',$data);
    }
}
