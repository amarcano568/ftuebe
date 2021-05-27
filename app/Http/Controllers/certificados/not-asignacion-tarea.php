<?php
    $alumno = App\Alumnos::select('numIdAlumno','strNombre','strApellidos','tareas')
    ->alumno($request->id_alumno)
    ->whereNotNull('tareas')
    ->where('tareas','!=','')->first();
   
    if($alumno === null){
        $resul = false;
        $mensaje = '<strong>Informe de notificación de tareas asignadas no pudo ser generado debido a que esta alumno no tiene tareas asignadas.</strong>';
    }else{   
        $data_pdf[] = [
            'nombre' => trim($alumno['strNombre']).' '.trim($alumno['strApellidos']),
            'tarea' => $this->tareasAsignadas($alumno['tareas'])
        ];

        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');        
        $data = array(
            'data' => $data_pdf,              
            'fecha' => $hoy,            
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-notificacion-tareas-asignada', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>