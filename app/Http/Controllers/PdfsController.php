<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use \DataTables;
use Illuminate\Support\Facades\DB;
use Redirect, Response, Config;
use Mail;
use App\Traits\funcGral;
use App\Http\Controllers\View;
use PDF;
use App\Alumnos;
use App\Trabajos_realizados;
use App\Trabajos;
use App\Tipo_documento;
use App\Tipo_estudios;
use App\GruposFamiliares;

class PdfsController extends Controller
{
    use funcGral;
    protected $showIslr;

    public function verPdfImputarTrabajo(Request $request)
    {
        
        $alumnos_trabajo = Trabajos_realizados::select('id_alumno')->alumno($request->id_alumno)->mes($request->mes_filtro)->ano($request->ano_filtro)->distinct()->get();
        $data_pdf = [];
        foreach($alumnos_trabajo as $item){
            $alumno = Alumnos::select('strNombre','strApellidos')->find($item->id_alumno);
            $data_pdf[] = [
                    'nombre' => trim($alumno->strNombre).' '.trim($alumno->strApellidos),
                    'tarea' => $this->tareaRealizada($item->id_alumno,$request->mes_filtro,$request->ano_filtro)
            ];
        }
        $data = array(
            'data' =>   $data_pdf
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-imputar-trabajo', $data)->setPaper('A4', 'portrait')->save($rutaFile);
        return response()->json(array('success' => true, 'mensaje' => 'Pdf detalle generado exitosamente', 'data' => $ruta, '' => ''));
    }

    public function tareaRealizada($id_alumno,$mes,$ano){
        $tareas = Trabajos_realizados::join('trabajos', 'trabajos.id', 'trabajos_realizados.id_trabajo')->alumno($id_alumno)->mes($mes)->ano($ano)->get();
        $arreglo = [];
        foreach($tareas as $tarea){
            $hora_inicio = new Carbon($tarea->fecha." ".$tarea->hora_inicio);
            $hora_fin = new Carbon($tarea->fecha." ".$tarea->hora_fin);
            $horas_trabajadas = $hora_inicio->diffInHours($hora_fin);
            $minutos_trabajados = $hora_inicio->diffInMinutes($hora_fin);
            array_push($arreglo,[
                'tarea' => $tarea->trabajo,
                'fecha' => Carbon::parse($tarea->fecha)->format('d-m-Y'),
                'hora_inicio' => $tarea->hora_inicio,
                'hora_fin' => $tarea->hora_fin,
                'horas_trabajadas' => $horas_trabajadas,
                'minutos_trabajados' => (($horas_trabajadas*60)-$minutos_trabajados)*-1,
                'pago' => ($tarea->precio/60)*$minutos_trabajados
            ]);
        }
        return $arreglo;
    }

    public function sendMailResumen(Request $request)
    {
        $cliente = Clientes::find($request->idCliente);
        $empresa = Empresa::first();
        $details = array(
            'empresa' => $empresa,
            'cliente' => $cliente,
        );

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $rutaFile = base_path() . '\public\\' . $request->archivoPdf;
        } else {
            $rutaFile =  public_path($request->archivoPdf);
        }

        $data = [
            'email'   => $cliente->email,
            'subject' => 'Planeación A La Medida – Resumen',
            'adjunto'    =>  $rutaFile
        ];


        Mail::send('emails.plantilla', $details, function ($message) use ($data) {
            $message->to($data['email'], 'Pensión a la medida.');
            $message->attach($data['adjunto']);
            $message->subject($data['subject']);
        });

        if (Mail::failures()) {
            return response()->json(array('success' => true, 'mensaje' => 'Envío de correo a fallado'));
        } else {
            return response()->json(array('success' => true, 'mensaje' => 'El correo se ha enviado con exito'));
        }
    }

    public function moduloInformes()
    {        
        $alumnos = Alumnos::select('numIdAlumno','strNombre','strApellidos')->where('blnVigente',1)->get();
        $data = [
            'alumnos' => $alumnos,
        ];
        return view('pdf.modulo-informes',$data);
    }

    public function certificadosPdf(Request $request){
       
        switch ($request->tipo_certificado) {
            case "cert-alojamiento-eventual":
                include_once "certificados/cert-alojamiento-eventual.php";
                break;
            case "cert-condicion-alumno":
                include_once "certificados/cert-condicion-alumno.php";
                break;
            case "cert-de-empadronamiento":
                include_once "certificados/cert-de-empadronamiento.php";
                break;
            
        }

        if ($resul){
            return response()->json(array('success' => true, 'message' => $mensaje, 'data' => $ruta, '' => ''));
        }else{
            return response()->json(array('success' => false, 'message' => $mensaje, 'data' => '', '' => ''));
        }
            
    }

    
}
