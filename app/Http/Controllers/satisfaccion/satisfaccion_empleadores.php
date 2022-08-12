<?php 

    function posicionEnElExcelEmpleadores(){

        $respondidas    = 'O7';
        $empleadores    = 'O8';
        $pos_items_primera_pregunta = ['C4','D4','E4','F4','G4','H4','I4','J4','K4','C5','D5','E5'];
        $pos_items_segunda_pregunta = ['C6','D6','E6','F6','G6','H6'];
        $pos_items_tercera_pregunta = ['C7'];
      
        return [
            'respondidas' => $respondidas,
            'empleadores' => $empleadores,
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,

        ];
    }

    function respondidas($ficheroCSV){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');
        $fila = 1;
        $respondidas = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=3 && $fila<=5){
                $respondidas += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);
        return $respondidas;
    }

    function preguntas_1_empleadores($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=67 && $fila<=70){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item1 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 2 */
        $fila = 1;
        $item2 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=72 && $fila<=75){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item2 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 3 */
        $fila = 1;
        $item3 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=77 && $fila<=80){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item3 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 4 */
        $fila = 1;
        $item4 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=82 && $fila<=85){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item4 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 5 */
        $fila = 1;
        $item5 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=87 && $fila<=90){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item5 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 6 */
        $fila = 1;
        $item6 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=92 && $fila<=95){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item6 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 7 */
        $fila = 1;
        $item7 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=97 && $fila<=100){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item7 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 8 */
        $fila = 1;
        $item8 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=102 && $fila<=105){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item8 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 9 */
        $fila = 1;
        $item9 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=107 && $fila<=110){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item9 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 10 */
        $fila = 1;
        $item10 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=112 && $fila<=115){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item10 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 11 */
        $fila = 1;
        $item11 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=117 && $fila<=120){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item11 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 12 */
        $fila = 1;
        $item12 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=122 && $fila<=125){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item12 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1'     => $item1,
            'item2'     => $item2,
            'item3'     => $item3,
            'item4'     => $item4,
            'item5'     => $item5,
            'item6'     => $item6,
            'item7'     => $item7,
            'item8'     => $item8,
            'item9'     => $item9,
            'item10'    => $item10,
            'item11'    => $item11,
            'item12'    => $item12,
        ];
    }

    function preguntas_2_empleadores($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=131 && $fila<=134){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item1 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 2 */
        $fila = 1;
        $item2 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=136 && $fila<=139){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item2 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 3 */
        $fila = 1;
        $item3 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=141 && $fila<=144){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item3 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 4 */
        $fila = 1;
        $item4 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=146 && $fila<=149){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item4 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 5 */
        $fila = 1;
        $item5 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=151 && $fila<=154){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item5 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 6 */
        $fila = 1;
        $item6 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=156 && $fila<=159){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item6 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,
            'item5' => $item5,
            'item6' => $item6,            
        ];
    }

    function preguntas_3_empleadores($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=180 && $fila<=183){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item1 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1,            
        ];
    }    

?>