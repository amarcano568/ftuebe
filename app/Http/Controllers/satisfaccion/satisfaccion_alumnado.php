<?php 

function posicionEnElExcelAlumnado($periodo){

        switch ($periodo) {
            case '2016-2017':
                // No tiene
                break;
            case '2017-2018':
                $pos_items_primera_pregunta =   ['C86'];
                $pos_items_segunda_pregunta =   ['C87','D87','E87','F87'];
                $pos_items_tercera_pregunta =   ['C88','D88','E88','F88','G88','H88'];
                $pos_items_cuarta_pregunta  =   ['C89','D89','E89','F89','G89'];
                $pos_items_quinta_pregunta  =   ['C90','D90','E90','F90'];
                $pos_items_sexta_pregunta  =    ['C91','D91','E91','F91','G91','H91','I91','J91','K91'];
                $pos_items_septima_pregunta  =  ['C92','D92','E92','F92','G92','H92','I92','J92','K92'];
                break; 
            case '2018-2019':
                $pos_items_primera_pregunta =   ['C98'];
                $pos_items_segunda_pregunta =   ['C99','D99','E99','F99'];
                $pos_items_tercera_pregunta =   ['C100','D100','E100','F100','G100','H100'];
                $pos_items_cuarta_pregunta  =   ['C101','D101','E101','F101','G101'];
                $pos_items_quinta_pregunta  =   ['C102','D102','E102','F102'];
                $pos_items_sexta_pregunta  =    ['C103','D103','E103','F103','G103','H103','I103','J103','K103'];
                $pos_items_septima_pregunta  =  ['C104','D104','E104','F104','G104','H104','I104','J104','K104'];
                break;
            case '2019-2020':
                $pos_items_primera_pregunta =   ['C109'];
                $pos_items_segunda_pregunta =   ['C110','D110','E110','F110'];
                $pos_items_tercera_pregunta =   ['C111','D111','E111','F111','G111','H111'];
                $pos_items_cuarta_pregunta  =   ['C112','D112','E112','F112','G112'];
                $pos_items_quinta_pregunta  =   ['C113','D113','E113','F113'];
                $pos_items_sexta_pregunta  =    ['C114','D114','E114','F114','G114','H114','I114','J114','K114'];
                $pos_items_septima_pregunta  =  ['C115','D115','E115','F115','G115','H115','I115','J115','K115'];
                break;
            case '2020-2021':
                $pos_items_primera_pregunta =   ['C120'];
                $pos_items_segunda_pregunta =   ['C121','D121','E121','F121'];
                $pos_items_tercera_pregunta =   ['C122','D122','E122','F122','G122','H122'];
                $pos_items_cuarta_pregunta  =   ['C123','D123','E123','F123','G123'];
                $pos_items_quinta_pregunta  =   ['C124','D124','E124','F124'];
                $pos_items_sexta_pregunta  =    ['C125','D125','E125','F125','G125','H125','I125','J125','K125'];
                $pos_items_septima_pregunta  =  ['C126','D126','E126','F126','G126','H126','I126','J126','K126'];
                break;
            case '2021-2022':
                $pos_items_primera_pregunta =   ['C131'];
                $pos_items_segunda_pregunta =   ['C132','D132','E132','F132'];
                $pos_items_tercera_pregunta =   ['C133','D133','E133','F133','G133','H133'];
                $pos_items_cuarta_pregunta  =   ['C134','D134','E134','F134','G134'];
                $pos_items_quinta_pregunta  =   ['C135','D135','E135','F135'];
                $pos_items_sexta_pregunta  =    ['C136','D136','E136','F136','G136','H136','I136','J136','K136'];
                $pos_items_septima_pregunta  =  ['C137','D137','E137','F137','G137','H137','I137','J137','K137'];
                break;
            case '2022-2023':
                $pos_items_primera_pregunta =   ['C142'];
                $pos_items_segunda_pregunta =   ['C143','D143','E143','F143'];
                $pos_items_tercera_pregunta =   ['C144','D144','E144','F144','G144','H144'];
                $pos_items_cuarta_pregunta  =   ['C145','D145','E145','F145','G145'];
                $pos_items_quinta_pregunta  =   ['C146','D146','E146','F146'];
                $pos_items_sexta_pregunta  =    ['C147','D147','E147','F147','G147','H147','I147','J147','K147'];
                $pos_items_septima_pregunta  =  ['C148','D148','E148','F148','G148','H148','I148','J148','K148'];
                break;
            case '2023-2024':
                $pos_items_primera_pregunta =   ['C153'];
                $pos_items_segunda_pregunta =   ['C154','D154','E154','F154'];
                $pos_items_tercera_pregunta =   ['C155','D155','E155','F155','G155','H155'];
                $pos_items_cuarta_pregunta  =   ['C156','D156','E156','F156','G156'];
                $pos_items_quinta_pregunta  =   ['C157','D157','E157','F157'];
                $pos_items_sexta_pregunta  =    ['C158','D158','E158','F158','G158','H158','I158','J158','K158'];
                $pos_items_septima_pregunta  =  ['C159','D159','E159','F159','G159','H159','I159','J159','K159']; 
                break;
            case '2024-2025':
                $pos_items_primera_pregunta =   ['C164'];
                $pos_items_segunda_pregunta =   ['C165','D165','E165','F165'];
                $pos_items_tercera_pregunta =   ['C166','D166','E166','F166','G166','H166'];
                $pos_items_cuarta_pregunta  =   ['C167','D167','E167','F167','G167'];
                $pos_items_quinta_pregunta  =   ['C168','D168','E168','F168'];
                $pos_items_sexta_pregunta  =    ['C169','D169','E169','F169','G169','H169','I169','J169','K169'];
                $pos_items_septima_pregunta  =  ['C170','D170','E170','F170','G170','H170','I170','J170','K170']; 
                break;
            case '2025-2026':
                $pos_items_primera_pregunta =   ['C175'];
                $pos_items_segunda_pregunta =   ['C176','D176','E176','F176'];
                $pos_items_tercera_pregunta =   ['C177','D177','E177','F177','G177','H177'];
                $pos_items_cuarta_pregunta  =   ['C178','D178','E178','F178','G178'];
                $pos_items_quinta_pregunta  =   ['C179','D179','E179','F179'];
                $pos_items_sexta_pregunta  =    ['C180','D180','E180','F180','G180','H180','I180','J180','K180'];
                $pos_items_septima_pregunta  =  ['C181','D181','E181','F181','G181','H181','I181','J181','K181']; 
                break;
            case '2026-2027':
                $pos_items_primera_pregunta =   ['C186'];
                $pos_items_segunda_pregunta =   ['C187','D187','E187','F187'];
                $pos_items_tercera_pregunta =   ['C188','D188','E188','F188','G188','H188'];
                $pos_items_cuarta_pregunta  =   ['C189','D189','E189','F189','G189'];
                $pos_items_quinta_pregunta  =   ['C190','D190','E190','F190'];
                $pos_items_sexta_pregunta  =    ['C191','D191','E191','F191','G191','H191','I191','J191','K191'];
                $pos_items_septima_pregunta  =  ['C192','D192','E192','F192','G192','H192','I192','J192','K192']; 
                break;
        
        }

        return [
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,
            'pos_items_cuarta_pregunta'     => $pos_items_cuarta_pregunta,
            'pos_items_quinta_pregunta'     => $pos_items_quinta_pregunta,
            'pos_items_sexta_pregunta'      => $pos_items_sexta_pregunta,
            'pos_items_septima_pregunta'    => $pos_items_septima_pregunta,

        ];
    }

    function respondidasAlumnado($ficheroCSV){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');
        $fila = 1;
        $respondidas = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=42 && $fila<=46){
                $respondidas += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);
        return $respondidas;
    }

    function preguntas_1_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=42 && $fila<=46){
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

    function preguntas_2_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=52 && $fila<=56){
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
            if($fila>=58 && $fila<=62){
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
            if($fila>=64 && $fila<=68){
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
            if($fila>=70 && $fila<=74){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item4 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);        

        return [
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,           
        ];
    }

    function preguntas_3_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=80 && $fila<=84){
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
            if($fila>=87 && $fila<=91){
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
            if($fila>=94 && $fila<=98){
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
            if($fila>=101 && $fila<=105){
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
            if($fila>=108 && $fila<=112){
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
            if($fila>=115 && $fila<=119){
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

    function preguntas_4_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=126 && $fila<=130){
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
            if($fila>=132 && $fila<=136){
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
            if($fila>=138 && $fila<=142){
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
            if($fila>=144 && $fila<=148){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item4 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);      
                      

        return [
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,                      
        ];
    }

    function preguntas_5_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=154 && $fila<=158){
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
            if($fila>=160 && $fila<=164){
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
            if($fila>=166 && $fila<=170){
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
            if($fila>=172 && $fila<=176){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item4 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);      
                      

        return [
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,                      
        ];
    }

    function preguntas_6_alumnado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=199 && $fila<=203){
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
            if($fila>=205 && $fila<=209){
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
            if($fila>=211 && $fila<=215){
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
            if($fila>=217 && $fila<=221){
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
            if($fila>=223 && $fila<=227){
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
            if($fila>=229 && $fila<=233){
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
            if($fila>=235 && $fila<=239){
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
            if($fila>=241 && $fila<=245){
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
            if($fila>=247 && $fila<=251){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item9 += ($media*5)/100;
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
            'item7' => $item7,
            'item8' => $item8,                      
            'item9' => $item9,     
        ];
    }

    

?>