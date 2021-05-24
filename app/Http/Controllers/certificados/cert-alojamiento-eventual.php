<?php
 
    $alumno = App\Alumnos::select(DB::raw('DATE_FORMAT(desde,"%d/%m/%Y") AS desde'),DB::raw('DATE_FORMAT(hasta,"%d/%m/%Y") AS hasta'),'strNombre','strApellidos','nacionalidad','strNif','documento','pais','strProvinciaNacimiento',DB::raw('(CASE WHEN alumnos.strSexo = "H" THEN "alojado" ELSE "alojada" END) AS alojado'))
    ->leftjoin('nacionalidades', 'nacionalidades.id', 'alumnos.numIdPaisNacimiento')
    ->leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')
    ->leftjoin('hospedajes', 'hospedajes.uuid', 'alumnos.uuid_habitacion')
    ->find($request->id_alumno);

    if($alumno === null){
        $resul = false;
        $mensaje = '<strong>El certificado no pudo ser generado.</strong><br>Asegurese que este alumno tiene residencia en la facultad, Pais de Nacimiento y tipo de documento.';
    }else{   
        $resul = true;
        $mensaje = 'Certificado generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        
        $data = array(
            'alumno' =>  $alumno,
            'fecha' => $hoy
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-alojamiento-eventual', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }

?>