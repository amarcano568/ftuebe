<?php
 
    $alumno = App\Alumnos::select('estudio','strNombre','strApellidos','nacionalidad','strNif','documento','pais','strProvinciaNacimiento',DB::raw('(CASE WHEN alumnos.strSexo = "H" THEN "alojado" ELSE "alojada" END) AS alojado'))
    ->leftjoin('nacionalidades', 'nacionalidades.id', 'alumnos.numIdPaisNacimiento')
    ->leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')
    ->leftjoin('tipo_estudios', 'tipo_estudios.id', 'alumnos.numIdTipoAlumno')
    ->find($request->id_alumno);

    if($alumno === null){
        $resul = false;
        $mensaje = '<strong>El certificado no pudo ser generado.</strong><br>Asegurese que este alumno tiene tipo de estudio.';
    }else{   
        $resul = true;
        $mensaje = 'Certificado generado exitosamente';
        Carbon\Carbon::setLocale('es');
        $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');
        
        $data = array(
            'alumno' =>  $alumno,
            'periodo' => $request->periodo_certificacion_condicion,
            'ano' => $request->ano_certificacion_condicion,
            'fecha' => $hoy
        );
        $nameFilePdf = uniqid('pdf_').'.pdf';
        $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
        $ruta = 'pdf/' . $nameFilePdf;
        
        \PDF::loadView('pdf.pdf-condicion-alumno', $data)->setPaper('A4', 'portrait')->save($rutaFile);       
    }

?>