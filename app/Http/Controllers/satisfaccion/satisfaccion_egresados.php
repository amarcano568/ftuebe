<?php 

    function posicionEnElExcelEgresados(){

        $respondidas  = 'O6';
        $egresados    = 'O7';
        $pos_items_primera_pregunta = ['C4'];
        $pos_items_segunda_pregunta = ['C5'];
        $pos_items_tercera_pregunta = ['C6'];
        $pos_items_cuarta_pregunta  = ['C7','D7','E7','F7','G7'];
        $pos_items_quinta_pregunta  = ['C9'];
        $pos_items_sexta_pregunta   = ['C10','D10'];
      
        return [
            'respondidas' => $respondidas,
            'egresados' => $egresados,
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,
            'pos_items_cuarta_pregunta'     => $pos_items_cuarta_pregunta,
            'pos_items_quinta_pregunta'     => $pos_items_quinta_pregunta,
            'pos_items_sexta_pregunta'      => $pos_items_sexta_pregunta,

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

    function preguntas_1_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==19){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==20){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==21){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==22){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==23){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1'     => $item1/$suma1,            
        ];
    }

    function preguntas_2_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==28){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==29){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==30){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==31){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==32){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1/$suma1,         
        ];
    }

    function preguntas_3_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==37){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==38){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==39){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==40){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==41){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1/$suma1,            
        ];
    }    

    function preguntas_4_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==46){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==47){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==48){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==49){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==50){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 2 */
        $fila = 1;
        $item2 = 0;
        $suma2 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==55){
                $item2 += (int)$linea[1]*5;$suma2 += (int)$linea[1];
            }
            if($fila==56){
                $item2 += (int)$linea[1]*4;$suma2 += (int)$linea[1];
            }
            if($fila==57){
                $item2 += (int)$linea[1]*3;$suma2 += (int)$linea[1];
            }
            if($fila==58){
                $item2 += (int)$linea[1]*2;$suma2 += (int)$linea[1];
            }
            if($fila==59){
                $item2 += (int)$linea[1]*1;$suma2 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 3 */
        $fila = 1;
        $item3 = 0;
        $suma3 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==64){
                $item3 += (int)$linea[1]*5;$suma3 += (int)$linea[1];
            }
            if($fila==65){
                $item3 += (int)$linea[1]*4;$suma3 += (int)$linea[1];
            }
            if($fila==66){
                $item3 += (int)$linea[1]*3;$suma3 += (int)$linea[1];
            }
            if($fila==67){
                $item3 += (int)$linea[1]*2;$suma3 += (int)$linea[1];
            }
            if($fila==68){
                $item3 += (int)$linea[1]*1;$suma3 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 4 */
        $fila = 1;
        $item4 = 0;
        $suma4 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==73){
                $item4 += (int)$linea[1]*5;$suma4 += (int)$linea[1];
            }
            if($fila==74){
                $item4 += (int)$linea[1]*4;$suma4 += (int)$linea[1];
            }
            if($fila==75){
                $item4 += (int)$linea[1]*3;$suma4 += (int)$linea[1];
            }
            if($fila==76){
                $item4 += (int)$linea[1]*2;$suma4 += (int)$linea[1];
            }
            if($fila==77){
                $item4 += (int)$linea[1]*1;$suma4 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 5 */
        $fila = 1;
        $item5 = 0;
        $suma5 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==82){
                $item5 += (int)$linea[1]*5;$suma5 += (int)$linea[1];
            }
            if($fila==83){
                $item5 += (int)$linea[1]*4;$suma5 += (int)$linea[1];
            }
            if($fila==84){
                $item5 += (int)$linea[1]*3;$suma5 += (int)$linea[1];
            }
            if($fila==85){
                $item5 += (int)$linea[1]*2;$suma5 += (int)$linea[1];
            }
            if($fila==86){
                $item5 += (int)$linea[1]*1;$suma5 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1/$suma1, 
            'item2' => $item2/$suma2,            
            'item3' => $item3/$suma3, 
            'item4' => $item4/$suma4, 
            'item5' => $item5/$suma5, 
        ];
    }

    function preguntas_5_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==91){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==92){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==93){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==94){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==95){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1/$suma1,            
        ];
    } 

    function preguntas_6_egresados($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==100){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==101){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==102){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==103){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==104){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 1 */
        $fila = 1;
        $item2 = 0;
        $suma2 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==109){
                $item2 += (int)$linea[1]*5;$suma2 += (int)$linea[1];
            }
            if($fila==110){
                $item2 += (int)$linea[1]*4;$suma2 += (int)$linea[1];
            }
            if($fila==111){
                $item2 += (int)$linea[1]*3;$suma2 += (int)$linea[1];
            }
            if($fila==112){
                $item2 += (int)$linea[1]*2;$suma2 += (int)$linea[1];
            }
            if($fila==113){
                $item2 += (int)$linea[1]*1;$suma2 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1' => $item1/$suma1,
            'item2' => $item2/$suma2,            
        ];
    } 

?>