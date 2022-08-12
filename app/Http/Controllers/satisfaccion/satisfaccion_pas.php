<?php 

function posicionEnElExcelPas($periodo){

        $respondidas    = 'P6';
        $personal       = 'P7';
        $pos_items_primera_pregunta = ['C5'];
        $pos_items_segunda_pregunta = ['C6','D6','E6','F6','G6','H6'];
        $pos_items_tercera_pregunta = ['C8','D8','E8','F8','G8','H8','I8','J8'];
        $pos_items_cuarta_pregunta  = ['C9','D9','E9','F9','G9','H9','I9','J9','K9','L9'];

        return [
            'respondidas' => $respondidas,
            'personal' => $personal,
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,
            'pos_items_cuarta_pregunta'     => $pos_items_cuarta_pregunta,

        ];
    }

    function respondidasPas($ficheroCSV){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');
        $fila = 1;
        $respondidas = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=3 && $fila<=7){
                $respondidas += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);
        return $respondidas;
    }

    function preguntas_1_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==22){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==23){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==24){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==25){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==26){
                $item1 += (int)$linea[1]*1;$suma1 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        return [
            'item1'     => $item1/$suma1,            
        ];
    
    }

    function preguntas_2_pas($ficheroCSV,$respondidas){
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

        /* Item 2 */
        $fila = 1;
        $item2 = 0;
        $suma2 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==43){
                $item2 += (int)$linea[1]*5;$suma2 += (int)$linea[1];
            }
            if($fila==44){
                $item2 += (int)$linea[1]*4;$suma2 += (int)$linea[1];
            }
            if($fila==45){
                $item2 += (int)$linea[1]*3;$suma2 += (int)$linea[1];
            }
            if($fila==46){
                $item2 += (int)$linea[1]*2;$suma2 += (int)$linea[1];
            }
            if($fila==47){
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
            if($fila==49){
                $item3 += (int)$linea[1]*5;$suma3 += (int)$linea[1];
            }
            if($fila==50){
                $item3 += (int)$linea[1]*4;$suma3 += (int)$linea[1];
            }
            if($fila==51){
                $item3 += (int)$linea[1]*3;$suma3 += (int)$linea[1];
            }
            if($fila==52){
                $item3 += (int)$linea[1]*2;$suma3 += (int)$linea[1];
            }
            if($fila==53){
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
            if($fila==55){
                $item4 += (int)$linea[1]*5;$suma4 += (int)$linea[1];
            }
            if($fila==56){
                $item4 += (int)$linea[1]*4;$suma4 += (int)$linea[1];
            }
            if($fila==57){
                $item4 += (int)$linea[1]*3;$suma4 += (int)$linea[1];
            }
            if($fila==58){
                $item4 += (int)$linea[1]*2;$suma4 += (int)$linea[1];
            }
            if($fila==59){
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
             if($fila==61){
                 $item5 += (int)$linea[1]*5;$suma5 += (int)$linea[1];
             }
             if($fila==62){
                 $item5 += (int)$linea[1]*4;$suma5 += (int)$linea[1];
             }
             if($fila==63){
                 $item5 += (int)$linea[1]*3;$suma5 += (int)$linea[1];
             }
             if($fila==64){
                 $item5 += (int)$linea[1]*2;$suma5 += (int)$linea[1];
             }
             if($fila==65){
                 $item5 += (int)$linea[1]*1;$suma5 += (int)$linea[1];
             }
             $fila++;
         }
         fclose($file_handle);

         /* Item 6 */
         $fila = 1;
         $item6 = 0;
         $suma6 = 0;
         $file_handle = fopen($csvFile, 'r');
         while (!feof($file_handle)) {
             $linea = fgetcsv($file_handle, 0, ';');
             if($fila==67){
                 $item6 += (int)$linea[1]*5;$suma6 += (int)$linea[1];
             }
             if($fila==68){
                 $item6 += (int)$linea[1]*4;$suma6 += (int)$linea[1];
             }
             if($fila==69){
                 $item6 += (int)$linea[1]*3;$suma6 += (int)$linea[1];
             }
             if($fila==70){
                 $item6 += (int)$linea[1]*2;$suma6 += (int)$linea[1];
             }
             if($fila==71){
                 $item6 += (int)$linea[1]*1;$suma6 += (int)$linea[1];
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
            'item6' => $item6/$suma6,         
        ];
    }
    

?>