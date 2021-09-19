<?php 

function posicionEnElExcelProfesorado($periodo){

        switch ($periodo) {
            case '2016-2017':
                $respondidas    = 'O5';
                $profesores     = 'O6';
                $asignaturas    = 'O7';
                $pos_items_primera_pregunta = ['C4','D4','E4','F4','G4','H4'];
                $pos_items_segunda_pregunta = ['C5','D5','E5','F5','G5','H5','I5','J5','K5','C6','D6','E6','F6'];
                $pos_items_tercera_pregunta = ['C7','D7','E7','F7','G7'];
                $pos_items_cuarta_pregunta  = ['C8','D8','E8','F8','G8'];
                break;
            case '2017-2018':
                $respondidas    = 'O14';
                $profesores     = 'O15';
                $asignaturas    = 'O16';
                $pos_items_primera_pregunta = ['C13','D13','E13','F13','G13','H13'];
                $pos_items_segunda_pregunta = ['C14','D14','E14','F14','G14','H14','I14','J14','K14','C15','D15','E15','F15'];
                $pos_items_tercera_pregunta = ['C16','D16','E16','F16','G16'];
                $pos_items_cuarta_pregunta  = ['C17','D17','E17','F17','G17'];
                break; 
            case '2018-2019':
                $respondidas    = 'O23';
                $profesores     = 'O24';
                $asignaturas    = 'O25';
                $pos_items_primera_pregunta = ['C22','D22','E22','F22','G22','H22'];
                $pos_items_segunda_pregunta = ['C23','D23','E23','F23','G23','H23','I23','J23','K23','C24','D24','E24','F24'];
                $pos_items_tercera_pregunta = ['C25','D25','E25','F25','G25'];
                $pos_items_cuarta_pregunta  = ['C26','D26','E26','F26','G26'];
                break;
            case '2019-2020':
                $respondidas    = 'O32';
                $profesores     = 'O33';
                $asignaturas    = 'O34';
                $pos_items_primera_pregunta = ['C31','D31','E31','F31','G31','H31'];
                $pos_items_segunda_pregunta = ['C32','D32','E32','F32','G32','H32','I32','J32','K32','C33','D33','E33','F33'];
                $pos_items_tercera_pregunta = ['C34','D34','E34','F34','G34'];
                $pos_items_cuarta_pregunta  = ['C35','D35','E35','F35','G35']; 
                break;
            case '2020-2021':
                $respondidas    = 'O41';
                $profesores     = 'O42';
                $asignaturas    = 'O43';
                $pos_items_primera_pregunta = ['C40','D40','E40','F40','G40','H40'];
                $pos_items_segunda_pregunta = ['C41','D41','E41','F41','G41','H41','I41','J41','K41','C42','D42','E42','F42'];
                $pos_items_tercera_pregunta = ['C43','D43','E43','F43','G43'];
                $pos_items_cuarta_pregunta  = ['C44','D44','E44','F44','G44']; 
                break;
            case '2021-2022':
                $respondidas    = 'O50';
                $profesores     = 'O51';
                $asignaturas    = 'O52';
                $pos_items_primera_pregunta = ['C49','D49','E49','F49','G49','H49'];
                $pos_items_segunda_pregunta = ['C50','D50','E50','F50','G50','H50','I50','J50','K50','C51','D51','E51','F51'];
                $pos_items_tercera_pregunta = ['C52','D52','E52','F52','G52'];
                $pos_items_cuarta_pregunta  = ['C53','D53','E53','F53','G53'];  
                break;
            case '2022-2023':
                $respondidas    = 'O59';
                $profesores     = 'O60';
                $asignaturas    = 'O61';
                $pos_items_primera_pregunta = ['C58','D58','E58','F58','G58','H58'];
                $pos_items_segunda_pregunta = ['C59','D59','E59','F59','G59','H59','I59','J59','K59','C60','D60','E60','F60'];
                $pos_items_tercera_pregunta = ['C61','D61','E61','F61','G61'];
                $pos_items_cuarta_pregunta  = ['C62','D62','E62','F62','G62']; 
                break;
            case '2023-2024':
                $respondidas    = 'O68';
                $profesores     = 'O69';
                $asignaturas    = 'O70';
                $pos_items_primera_pregunta = ['C67','D67','E67','F67','G67','H67'];
                $pos_items_segunda_pregunta = ['C68','D68','E68','F68','G68','H68','I68','J68','K68','C69','D69','E69','F69'];
                $pos_items_tercera_pregunta = ['C70','D70','E70','F70','G70'];
                $pos_items_cuarta_pregunta  = ['C71','D71','E71','F71','G71'];        
                break;
            case '2024-2025':
                $respondidas    = 'O77';
                $profesores     = 'O78';
                $asignaturas    = 'O79';
                $pos_items_primera_pregunta = ['C76','D76','E76','F76','G76','H76'];
                $pos_items_segunda_pregunta = ['C77','D77','E77','F77','G77','H77','I77','J77','K77','C78','D78','E78','F78'];
                $pos_items_tercera_pregunta = ['C79','D79','E79','F79','G79'];
                $pos_items_cuarta_pregunta  = ['C80','D80','E80','F80','G80']; 
                break;
            case '2025-2026':
                $respondidas    = 'O86';
                $profesores     = 'O87';
                $asignaturas    = 'O88';
                $pos_items_primera_pregunta = ['C85','D85','E85','F85','G85','H85'];
                $pos_items_segunda_pregunta = ['C86','D86','E86','F86','G86','H86','I86','J86','K86','C87','D87','E87','F87'];
                $pos_items_tercera_pregunta = ['C88','D88','E88','F88','G88'];
                $pos_items_cuarta_pregunta  = ['C89','D89','E89','F89','G89'];           
                break;
            case '2026-2027':
                $respondidas    = 'O95';
                $profesores     = 'O96';
                $asignaturas    = 'O97';
                $pos_items_primera_pregunta = ['C94','D94','E94','F94','G94','H94'];
                $pos_items_segunda_pregunta = ['C95','D95','E95','F95','G95','H95','I95','J95','K95','C96','D96','E96','F96'];
                $pos_items_tercera_pregunta = ['C97','D97','E97','F97','G97'];
                $pos_items_cuarta_pregunta  = ['C98','D98','E98','F98','G98'];  
                break;
        
        }

        return [
            'respondidas' => $respondidas,
            'profesores' => $profesores,
            'asignaturas' => $asignaturas,
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,
            'pos_items_cuarta_pregunta'     => $pos_items_cuarta_pregunta,

        ];
    }

    function respondidas($ficheroCSV){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');
        $fila = 1;
        $respondidas = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=4 && $fila<=9){
                $respondidas += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);
        return $respondidas;
    }

    function preguntas_1_profesorado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=4 && $fila<=8){
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
            if($fila>=11 && $fila<=15){
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
            if($fila>=18 && $fila<=22){
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
            if($fila>=25 && $fila<=29){
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
            if($fila>=32 && $fila<=36){
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
            if($fila>=39 && $fila<=43){
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

    function preguntas_2_profesorado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=50 && $fila<=54){
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
            if($fila>=57 && $fila<=61){
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
            if($fila>=71 && $fila<=75){
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
            if($fila>=78 && $fila<=82){
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
            if($fila>=85 && $fila<=89){
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
            if($fila>=92 && $fila<=96){
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
            if($fila>=99 && $fila<=103){
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
            if($fila>=106 && $fila<=110){
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
            if($fila>=113 && $fila<=117){
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
            if($fila>=120 && $fila<=124){
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
            if($fila>=127 && $fila<=131){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item12 += ($media*5)/100;
            }
            $fila++;
        }
        fclose($file_handle);

        /* Item 13 */
        $fila = 1;
        $item13 = 0;
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=134 && $fila<=138){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item13 += ($media*5)/100;
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
            'item10' => $item10,
            'item11' => $item11,
            'item12' => $item12,
            'item13' => $item13,
        ];
    }

    function preguntas_3_profesorado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=145 && $fila<=149){
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
            if($fila>=152 && $fila<=156){
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
            if($fila>=159 && $fila<=163){
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
            if($fila>=166 && $fila<=170){
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
            if($fila>=173 && $fila<=177){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item5 += ($media*5)/100;
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
        ];
    }

    function preguntas_4_profesorado($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=184 && $fila<=188){
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
            if($fila>=191 && $fila<=195){
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
            if($fila>=198 && $fila<=202){
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
            if($fila>=205 && $fila<=209){
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
            if($fila>=212 && $fila<=217){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item5 += ($media*5)/100;
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
        ];
    }

?>