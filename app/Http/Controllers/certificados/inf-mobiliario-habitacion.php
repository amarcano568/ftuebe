<?php
 
    $habitaciones = App\Habitaciones::num_hab($request->numero_habitacion)->get();
    if($habitaciones === null){
        $resul = false;
        $mensaje = '<strong>Informe de mobiliario por habitaciones no pudo ser generado.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $habitaciones_mobiliarios = [];
        foreach($habitaciones as $habitacion){
            array_push( $habitaciones_mobiliarios,
                [
                    'numero' => $habitacion->num_habitacion,
                    'tipo' =>  $this->tipoHabitacion($habitacion->tipo),
                    'capacidad' => $habitacion->capacidad,
                    'piso' => $habitacion->piso,
                    'mobiliarios' => $this->mobiliarios($habitacion->mobiliario)
                ]
            );
        }
        $data = array(
            'habitaciones_mobiliarios' =>  $habitaciones_mobiliarios,
            'fecha' => $hoy
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-mobiliario-habitacion', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>