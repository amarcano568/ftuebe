<?php
    if ($request->tipo_de_empadronamiento == 'Individual'){
        $alumno = App\Alumnos::select('strNombre','strApellidos','nacionalidad','strNif','documento','pais','strProvinciaNacimiento',DB::raw('(CASE WHEN alumnos.strSexo = "H" THEN "alojado" ELSE "alojada" END) AS alojado'))
        ->leftjoin('nacionalidades', 'nacionalidades.id', 'alumnos.numIdPaisNacimiento')
        ->leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')
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
                'fecha' => $hoy
            );
            $nameFilePdf = uniqid('pdf_').'.pdf';
            $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
            $ruta = 'pdf/' . $nameFilePdf;
            
            \PDF::loadView('pdf.pdf-de-empadronamiento-individual', $data)->setPaper('A4', 'portrait')->save($rutaFile);  
                    
        }
    }else{
        $uuid = App\Alumnos::select('uuid_grupo_familiar')->find($request->id_alumno);
        $grupo = App\GruposFamiliares::where('uuid',$uuid->uuid_grupo_familiar)->first();
        if($grupo === null){
            $resul = false;
            $mensaje = '<strong>El certificado no pudo ser generado.</strong><br>Asegurese que este alumno tenga grupo familiar registrado.';
        }else{   
            $resul = true;
            $mensaje = 'Certificado generado exitosamente';
            $padre = App\Alumnos::select('strNombre','strApellidos','nacionalidad','strNif','documento','pais','strProvinciaNacimiento')
                    ->leftjoin('nacionalidades', 'nacionalidades.id', 'alumnos.numIdPaisNacimiento')
                    ->leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')->find($grupo->padre);
            $madre = App\Alumnos::select('strNombre','strApellidos','nacionalidad','strNif','documento','pais','strProvinciaNacimiento')
                    ->leftjoin('nacionalidades', 'nacionalidades.id', 'alumnos.numIdPaisNacimiento')
                    ->leftjoin('tipo_documento', 'tipo_documento.id', 'alumnos.numTipoNif')->find($grupo->madre);
            $hijosExplode = explode("|",$grupo->hijos);
            $salida = '';
            $totalHijos = count($hijosExplode);
            $hijos = '';
            foreach($hijosExplode as $hijo){
                $data_hijo = App\Hijos::find($hijo);
                if ($data_hijo !== null){
                    $nombre = trim($data_hijo->nombres).' '.trim($data_hijo->apellidos);
                    $hijos .= $nombre.', ';
                }
            }

            if ($hijos == '' ){ //No tiene hijos
                $label_hijos = '';
            }else{
                $label_hijos = $totalHijos == 2 ? ' y su hijo '.$hijos : 'y sus hijos '.$hijos;
            }
                            
            Carbon\Carbon::setLocale('es');
            $hoy = Carbon\Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y');

            $familia = "Que <strong>$padre->strNombre $padre->strApellidos</strong>, de nacionalidad $padre->nacionalidad, con
            $padre->documento núm. $padre->strNif, su esposa <strong>$madre->strNombre $madre->strApellidos</strong>, de
            nacionalidad $madre->nacionalidad, con $madre->documento núm. $madre->strNif, $label_hijos están domiciliados actualmente en esta
            institución como residentes.";
            
            $data = array(
                'familia' =>  $familia,
                'fecha' => $hoy,
            );
            $nameFilePdf = uniqid('pdf_').'.pdf';
            $rutaFile = public_path() . '/pdf/' . $nameFilePdf;
            $ruta = 'pdf/' . $nameFilePdf;
    
            \PDF::loadView('pdf.pdf-de-empadronamiento-familiar', $data)->setPaper('A4', 'portrait')->save($rutaFile);  
                        
        }

    }
    

?>