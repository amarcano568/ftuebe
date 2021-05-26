<?php

    if($request->notifica_numero_hab == ''){
        $resul = false;
        $mensaje = '<strong>Informe de notificación de alojamiento no pudo ser generado debido a que esta alumno no tiene hospedaje asignado.</strong>';
    }else{   
        $alumno = App\Alumnos::select('strNombre','strApellidos')->find($request->id_alumno);
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $desde = Carbon\Carbon::parse($request->notifica_desde_hab);
        $hasta = Carbon\Carbon::parse($request->notifica_hasta_hab);
        $data = array(
            'alumno' => $alumno,
            'habitacion' =>  $request->notifica_numero_hab,            
            'fecha' => $hoy,
            'del' => $desde->format('d-m-Y'),
            'al' => $hasta->format('d-m-Y'),
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-notificacion-habitacion-asignada', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>