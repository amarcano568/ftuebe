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

    function preguntas_3_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==77){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==78){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==79){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==80){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==81){
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
            if($fila==83){
                $item2 += (int)$linea[1]*5;$suma2 += (int)$linea[1];
            }
            if($fila==84){
                $item2 += (int)$linea[1]*4;$suma2 += (int)$linea[1];
            }
            if($fila==85){
                $item2 += (int)$linea[1]*3;$suma2 += (int)$linea[1];
            }
            if($fila==86){
                $item2 += (int)$linea[1]*2;$suma2 += (int)$linea[1];
            }
            if($fila==87){
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
            if($fila==89){
                $item3 += (int)$linea[1]*5;$suma3 += (int)$linea[1];
            }
            if($fila==90){
                $item3 += (int)$linea[1]*4;$suma3 += (int)$linea[1];
            }
            if($fila==91){
                $item3 += (int)$linea[1]*3;$suma3 += (int)$linea[1];
            }
            if($fila==92){
                $item3 += (int)$linea[1]*2;$suma3 += (int)$linea[1];
            }
            if($fila==93){
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
            if($fila==95){
                $item4 += (int)$linea[1]*5;$suma4 += (int)$linea[1];
            }
            if($fila==96){
                $item4 += (int)$linea[1]*4;$suma4 += (int)$linea[1];
            }
            if($fila==97){
                $item4 += (int)$linea[1]*3;$suma4 += (int)$linea[1];
            }
            if($fila==98){
                $item4 += (int)$linea[1]*2;$suma4 += (int)$linea[1];
            }
            if($fila==99){
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
             if($fila==101){
                 $item5 += (int)$linea[1]*5;$suma5 += (int)$linea[1];
             }
             if($fila==102){
                 $item5 += (int)$linea[1]*4;$suma5 += (int)$linea[1];
             }
             if($fila==103){
                 $item5 += (int)$linea[1]*3;$suma5 += (int)$linea[1];
             }
             if($fila==104){
                 $item5 += (int)$linea[1]*2;$suma5 += (int)$linea[1];
             }
             if($fila==105){
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
             if($fila==107){
                 $item6 += (int)$linea[1]*5;$suma6 += (int)$linea[1];
             }
             if($fila==108){
                 $item6 += (int)$linea[1]*4;$suma6 += (int)$linea[1];
             }
             if($fila==109){
                 $item6 += (int)$linea[1]*3;$suma6 += (int)$linea[1];
             }
             if($fila==110){
                 $item6 += (int)$linea[1]*2;$suma6 += (int)$linea[1];
             }
             if($fila==111){
                 $item6 += (int)$linea[1]*1;$suma6 += (int)$linea[1];
             }
             $fila++;
         }
         fclose($file_handle);

        /* Item 7 */
        $fila = 1;
        $item7 = 0;
        $suma7 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==113){
                $item7 += (int)$linea[1]*5;$suma7 += (int)$linea[1];
            }
            if($fila==114){
                $item7 += (int)$linea[1]*4;$suma7 += (int)$linea[1];
            }
            if($fila==115){
                $item7 += (int)$linea[1]*3;$suma7 += (int)$linea[1];
            }
            if($fila==116){
                $item7 += (int)$linea[1]*2;$suma7 += (int)$linea[1];
            }
            if($fila==117){
                $item7 += (int)$linea[1]*1;$suma7 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 8 */
        $fila = 1;
        $item8 = 0;
        $suma8 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==119){
                $item8 += (int)$linea[1]*5;$suma8 += (int)$linea[1];
            }
            if($fila==120){
                $item8 += (int)$linea[1]*4;$suma8 += (int)$linea[1];
            }
            if($fila==121){
                $item8 += (int)$linea[1]*3;$suma8 += (int)$linea[1];
            }
            if($fila==122){
                $item8 += (int)$linea[1]*2;$suma8 += (int)$linea[1];
            }
            if($fila==123){
                $item8 += (int)$linea[1]*1;$suma8 += (int)$linea[1];
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
            'item7' => $item7/$suma7, 
            'item8' => $item8/$suma8,        
        ];
    }

    function preguntas_4_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        $suma1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==129){
                $item1 += (int)$linea[1]*5;$suma1 += (int)$linea[1];
            }
            if($fila==130){
                $item1 += (int)$linea[1]*4;$suma1 += (int)$linea[1];
            }
            if($fila==131){
                $item1 += (int)$linea[1]*3;$suma1 += (int)$linea[1];
            }
            if($fila==132){
                $item1 += (int)$linea[1]*2;$suma1 += (int)$linea[1];
            }
            if($fila==133){
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
            if($fila==135){
                $item2 += (int)$linea[1]*5;$suma2 += (int)$linea[1];
            }
            if($fila==136){
                $item2 += (int)$linea[1]*4;$suma2 += (int)$linea[1];
            }
            if($fila==137){
                $item2 += (int)$linea[1]*3;$suma2 += (int)$linea[1];
            }
            if($fila==138){
                $item2 += (int)$linea[1]*2;$suma2 += (int)$linea[1];
            }
            if($fila==139){
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
            if($fila==141){
                $item3 += (int)$linea[1]*5;$suma3 += (int)$linea[1];
            }
            if($fila==142){
                $item3 += (int)$linea[1]*4;$suma3 += (int)$linea[1];
            }
            if($fila==143){
                $item3 += (int)$linea[1]*3;$suma3 += (int)$linea[1];
            }
            if($fila==144){
                $item3 += (int)$linea[1]*2;$suma3 += (int)$linea[1];
            }
            if($fila==145){
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
            if($fila==147){
                $item4 += (int)$linea[1]*5;$suma4 += (int)$linea[1];
            }
            if($fila==148){
                $item4 += (int)$linea[1]*4;$suma4 += (int)$linea[1];
            }
            if($fila==149){
                $item4 += (int)$linea[1]*3;$suma4 += (int)$linea[1];
            }
            if($fila==150){
                $item4 += (int)$linea[1]*2;$suma4 += (int)$linea[1];
            }
            if($fila==151){
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
             if($fila==153){
                 $item5 += (int)$linea[1]*5;$suma5 += (int)$linea[1];
             }
             if($fila==154){
                 $item5 += (int)$linea[1]*4;$suma5 += (int)$linea[1];
             }
             if($fila==155){
                 $item5 += (int)$linea[1]*3;$suma5 += (int)$linea[1];
             }
             if($fila==156){
                 $item5 += (int)$linea[1]*2;$suma5 += (int)$linea[1];
             }
             if($fila==157){
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
             if($fila==159){
                 $item6 += (int)$linea[1]*5;$suma6 += (int)$linea[1];
             }
             if($fila==160){
                 $item6 += (int)$linea[1]*4;$suma6 += (int)$linea[1];
             }
             if($fila==161){
                 $item6 += (int)$linea[1]*3;$suma6 += (int)$linea[1];
             }
             if($fila==162){
                 $item6 += (int)$linea[1]*2;$suma6 += (int)$linea[1];
             }
             if($fila==163){
                 $item6 += (int)$linea[1]*1;$suma6 += (int)$linea[1];
             }
             $fila++;
         }
         fclose($file_handle);

        /* Item 7 */
        $fila = 1;
        $item7 = 0;
        $suma7 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==165){
                $item7 += (int)$linea[1]*5;$suma7 += (int)$linea[1];
            }
            if($fila==166){
                $item7 += (int)$linea[1]*4;$suma7 += (int)$linea[1];
            }
            if($fila==167){
                $item7 += (int)$linea[1]*3;$suma7 += (int)$linea[1];
            }
            if($fila==168){
                $item7 += (int)$linea[1]*2;$suma7 += (int)$linea[1];
            }
            if($fila==169){
                $item7 += (int)$linea[1]*1;$suma7 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 8 */
        $fila = 1;
        $item8 = 0;
        $suma8 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==171){
                $item8 += (int)$linea[1]*5;$suma8 += (int)$linea[1];
            }
            if($fila==172){
                $item8 += (int)$linea[1]*4;$suma8 += (int)$linea[1];
            }
            if($fila==173){
                $item8 += (int)$linea[1]*3;$suma8 += (int)$linea[1];
            }
            if($fila==174){
                $item8 += (int)$linea[1]*2;$suma8 += (int)$linea[1];
            }
            if($fila==175){
                $item8 += (int)$linea[1]*1;$suma8 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 9 */
        $fila = 1;
        $item9 = 0;
        $suma9 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==177){
                $item9 += (int)$linea[1]*5;$suma9 += (int)$linea[1];
            }
            if($fila==178){
                $item9 += (int)$linea[1]*4;$suma9 += (int)$linea[1];
            }
            if($fila==179){
                $item9 += (int)$linea[1]*3;$suma9 += (int)$linea[1];
            }
            if($fila==180){
                $item9 += (int)$linea[1]*2;$suma9 += (int)$linea[1];
            }
            if($fila==181){
                $item9 += (int)$linea[1]*1;$suma9 += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 10 */
        $fila = 1;
        $item10 = 0;
        $suma10 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila==183){
                $item10 += (int)$linea[1]*5;$suma10 += (int)$linea[1];
            }
            if($fila==184){
                $item10 += (int)$linea[1]*4;$suma10 += (int)$linea[1];
            }
            if($fila==185){
                $item10 += (int)$linea[1]*3;$suma10 += (int)$linea[1];
            }
            if($fila==186){
                $item10 += (int)$linea[1]*2;$suma10 += (int)$linea[1];
            }
            if($fila==187){
                $item10 += (int)$linea[1]*1;$suma10 += (int)$linea[1];
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
            'item7' => $item7/$suma7, 
            'item8' => $item8/$suma8,
            'item9' => $item9/$suma9,
            'item10' => $item10/$suma10,        
        ];
    }
    

?>