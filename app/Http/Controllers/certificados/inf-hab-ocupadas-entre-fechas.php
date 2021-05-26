<?php
    $desde = Carbon\Carbon::parse($request->fec_desde_ocupadas_hah);
    $hasta = Carbon\Carbon::parse($request->fec_hasta_ocupadas_hah);
    $habitaciones = App\Habitaciones::get();
    if($habitaciones === null){
        $resul = false;
        $mensaje = '<strong>Informe de habitaciones ocupadas no pudo ser generado.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $ocupadas = [];
        DB::enableQueryLog();
        foreach($habitaciones as $habitacion){
            $hospedajes = App\Hospedajes::select('num_habitacion', 'desde', 'hasta', 'fianza', 'fianza_monto', 'fianza_fecha', 'observaciones', 'check', 'checkout_at')
            ->whereBetween('desde', [$desde, $hasta])
            ->whereBetween('hasta', [$desde, $hasta])
            ->where('check','checkin')
            ->where('num_habitacion', $habitacion->num_habitacion)
            ->orderBy('id', 'desc')
            ->limit(-1)
            ->get();
            if (!$hospedajes->isEmpty()){
                array_push($ocupadas,$habitacion);
            }
            
        }
        $data = array(
            'hospedajes' =>  $ocupadas,
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
        
        \PDF::loadView('pdf.pdf-habitaciones-ocupadas', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>