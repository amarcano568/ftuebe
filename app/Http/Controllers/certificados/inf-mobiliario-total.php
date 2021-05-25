<?php
 
    $mobiliarios = App\Habitaciones::select('mobiliario')->get();
    if($mobiliarios === null){
        $resul = false;
        $mensaje = '<strong>Informe total de mobiliario no pudo ser generado.</strong>';
    }else{   
        $resul = true;
        $mensaje = 'Informe generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        $idMobiliarios = '';
        foreach($mobiliarios as $mobiliario){
            $idMobiliarios .= $mobiliario->mobiliario;
        }
        $idMobiliarios .= '|';
        $mobiliario_totales = App\Mobiliarios::get();
        $arreglo = [];
        foreach($mobiliario_totales as $item){            
            array_push($arreglo,['id' => $item->id, 'mobiliario' => $item->descripcion, 'total' => substr_count($idMobiliarios, '|'.$item->id.'|') ]);
        }

        $data = array(
            'mobiliario_totales' =>  $arreglo,
            'fecha' => $hoy
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-mobiliario-total', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }    

?>