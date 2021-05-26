<?php
    $desde = Carbon\Carbon::parse($request->fec_desde_desocupadas_hah);
    $hasta = Carbon\Carbon::parse($request->fec_hasta_desocupadas_hah);
    $habitaciones = App\Habitaciones::get();
    if($habitaciones === null){
        $resul = false;
        $mensaje = '<strong>Informe de habitaciones desocupadas no pudo ser generado.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $desocupadas = [];
        foreach($habitaciones as $habitacion){
            $hospedajes = App\Hospedajes::select('num_habitacion', 'desde', 'hasta', 'fianza', 'fianza_monto', 'fianza_fecha', 'observaciones', 'check', 'checkout_at', 'strNombre', 'strApellidos')
            ->join('alumnos', 'alumnos.numIdAlumno', 'hospedajes.id_alumno')
            ->whereBetween('desde', [$desde, $hasta])
            ->whereBetween('hasta', [$desde, $hasta])
            ->where('check','checkout')
            ->orderBy('id', 'desc')
            ->limit(-1)
            ->get();
            array_push($desocupadas,$habitacion);
        }
        $data = array(
            'hospedajes' =>  $desocupadas,
            'tipos' => [
                1 => 'Habitación familiar',
                2 => 'Habitación con cocina',
                3 => 'Habitación sin cocina',
                4 => 'Habitación complementaria sin cocina',
                5 => 'Habitación Zona UEBE',
                6 => 'Otras habitaciones',
            ],
            'fecha' => $hoy,
            'del' => $desde->format('d-m-Y'),
            'al' => $hasta->format('d-m-Y'),
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-habitaciones-desocupadas', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>