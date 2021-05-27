<?php
    $tareas = App\Alumnos::select('strNombre','strApellidos','tareas')->find($request->id_alumno);    
    if($tareas->tareas === null){
        $resul = false;
        $mensaje = '<strong>Informe de notificación de incumplimiento de tareas no pudo ser generado debido a que este alumno no tiene tareas asignadas.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $hasta = Carbon\Carbon::parse($request->notifica_fin_hasta_hab)->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $tareas_realizadas = App\Trabajos_realizados::select('id_trabajo')
        ->where('id_alumno',$request->id_alumno)
        ->whereMonth('fecha',$request->mes_filtro)
        ->whereYear('fecha',$request->ano_filtro)
        ->get();
        $arreglo_tareas = [];
        foreach($tareas_realizadas as $tarea){
            array_push($arreglo_tareas,$tarea->id_trabajo);
        }
        $tareas_asignadas = explode('|',$tareas->tareas);
        $tareas_no_realizadas = [];
        foreach($tareas_asignadas as $tarea){              
            if (!in_array($tarea, $arreglo_tareas) && $tarea != '') {                   
                $item = App\Trabajos::select('trabajo')->find($tarea);
                array_push($tareas_no_realizadas,[
                    'tarea' => $item->trabajo
                ]);
            }
        }
        $data = array(
            'alumno' => $tareas,
            'tareas_no_realizadas' =>  $tareas_no_realizadas,    
            'mes' => $request->mes_filtro,
            'ano' => $request->ano_filtro,
            'fecha' => $hoy,            
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-notificacion-tareas-no-realizadas', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>