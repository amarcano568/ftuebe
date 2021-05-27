<?php

    if($request->notifica_fin_numero_hab == ''){
        $resul = false;
        $mensaje = '<strong>Informe de notificación de finalización alojamiento no pudo ser generado debido a que esta alumno no tiene hospedaje asignado.</strong>';
    }else{   
        $alumno = App\Alumnos::select('strNombre','strApellidos')->find($request->id_alumno);
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $hasta = Carbon\Carbon::parse($request->notifica_fin_hasta_hab)->isoFormat('dddd D \d\e MMMM \d\e\l Y');;
        $data = array(
            'alumno' => $alumno,
            'habitacion' =>  $request->notifica_numero_hab,            
            'fecha' => $hoy,            
            'finaliza' => $hasta,
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-notificacion-finalizacion-alojamiento', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>