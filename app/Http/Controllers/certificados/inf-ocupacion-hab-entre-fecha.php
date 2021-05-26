<?php
    $desde = Carbon\Carbon::parse($request->fec_desde_ocup_hah);
    $hasta = Carbon\Carbon::parse($request->fec_hasta_ocup_hah);
    $hospedajes = App\Hospedajes::habitaciones($request->num_hab_ocup_fechas)->select('num_habitacion', 'desde', 'hasta', 'fianza', 'fianza_monto', 'fianza_fecha', 'observaciones', 'check', 'checkout_at', 'strNombre', 'strApellidos')
    ->leftjoin('alumnos', 'alumnos.numIdAlumno', 'hospedajes.id_alumno')
    ->whereBetween('desde', [$desde, $hasta])->OrwhereBetween('hasta', [$desde, $hasta])->get();
    if($hospedajes === null){
        $resul = false;
        $mensaje = '<strong>Informe total de mobiliario no pudo ser generado.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');

        $data = array(
            'hospedajes' =>  $hospedajes,
            'fecha' => $hoy,
            'del' => $desde->format('d-m-Y'),
            'al' => $hasta->format('d-m-Y'),
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-ocupacion-habitacion', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>