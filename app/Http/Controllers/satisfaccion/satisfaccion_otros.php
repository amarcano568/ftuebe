<?php 

function posicionEnElExcelOtros($periodo){

        switch ($periodo) {
            case '2016-2017':
                $respondidas    = 'O5';
                $pos_items_primera_pregunta = ['C4','D4','E4','F4'];
                $pos_items_segunda_pregunta = ['C5','D5','E5','F5'];
                $pos_items_tercera_pregunta = ['C7','D7','E7','F7'];
                $pos_items_cuarta_pregunta  = ['C8','D8','E8','F8'];
                break;
            case '2017-2018':
                $respondidas    = 'O14';
                $pos_items_primera_pregunta = ['C13','D13','E13','F13'];
                $pos_items_segunda_pregunta = ['C14','D14','E14','F14'];
                $pos_items_tercera_pregunta = ['C16','D16','E16','F16'];
                $pos_items_cuarta_pregunta  = ['C17','D17','E17','F17'];
                break; 
            case '2018-2019':
                $respondidas    = 'O23';
                $pos_items_primera_pregunta = ['C22','D22','E22','F22'];
                $pos_items_segunda_pregunta = ['C23','D23','E23','F23'];
                $pos_items_tercera_pregunta = ['C25','D25','E25','F25'];
                $pos_items_cuarta_pregunta  = ['C26','D26','E26','F26'];
                break;
            case '2019-2020':
                $respondidas    = 'O32';
                $pos_items_primera_pregunta = ['C31','D31','E31','F31'];
                $pos_items_segunda_pregunta = ['C32','D32','E32','F32'];
                $pos_items_tercera_pregunta = ['C34','D34','E34','F34'];
                $pos_items_cuarta_pregunta  = ['C35','D35','E35','F35']; 
                break;
            case '2020-2021':
                $respondidas    = 'O41';
                $pos_items_primera_pregunta = ['C40','D40','E40','F40'];
                $pos_items_segunda_pregunta = ['C41','D41','E41','F41'];
                $pos_items_tercera_pregunta = ['C43','D43','E43','F43'];
                $pos_items_cuarta_pregunta  = ['C44','D44','E44','F44']; 
                break;
            case '2021-2022':
                $respondidas    = 'O50';
                $pos_items_primera_pregunta = ['C49','D49','E49','F49'];
                $pos_items_segunda_pregunta = ['C50','D50','E50','F50'];
                $pos_items_tercera_pregunta = ['C52','D52','E52','F52'];
                $pos_items_cuarta_pregunta  = ['C53','D53','E53','F53'];  
                break;
            case '2022-2023':
                $respondidas    = 'O59';
                $pos_items_primera_pregunta = ['C58','D58','E58','F58'];
                $pos_items_segunda_pregunta = ['C59','D59','E59','F59'];
                $pos_items_tercera_pregunta = ['C61','D61','E61','F61'];
                $pos_items_cuarta_pregunta  = ['C62','D62','E62','F62']; 
                break;
            case '2023-2024':
                $respondidas    = 'O68';
                $pos_items_primera_pregunta = ['C67','D67','E67','F67'];
                $pos_items_segunda_pregunta = ['C68','D68','E68','F68'];
                $pos_items_tercera_pregunta = ['C70','D70','E70','F70'];
                $pos_items_cuarta_pregunta  = ['C71','D71','E71','F71'];        
                break;
            case '2024-2025':
                $respondidas    = 'O77';
                $pos_items_primera_pregunta = ['C76','D76','E76','F76'];
                $pos_items_segunda_pregunta = ['C77','D77','E77','F77'];
                $pos_items_tercera_pregunta = ['C79','D79','E79','F79'];
                $pos_items_cuarta_pregunta  = ['C80','D80','E80','F80']; 
                break;
            case '2025-2026':
                $respondidas    = 'O86';
                $pos_items_primera_pregunta = ['C85','D85','E85','F85'];
                $pos_items_segunda_pregunta = ['C86','D86','E86','F86'];
                $pos_items_tercera_pregunta = ['C88','D88','E88','F88'];
                $pos_items_cuarta_pregunta  = ['C89','D89','E89','F89'];           
                break;
            case '2026-2027':
                $respondidas    = 'O95';
                $pos_items_primera_pregunta = ['C94','D94','E94','F94'];
                $pos_items_segunda_pregunta = ['C95','D95','E95','F95'];
                $pos_items_tercera_pregunta = ['C97','D97','E97','F97'];
                $pos_items_cuarta_pregunta  = ['C98','D98','E98','F98'];  
                break;
        
        }

        return [
            'respondidas' => $respondidas,
            'pos_items_primera_pregunta'    => $pos_items_primera_pregunta,
            'pos_items_segunda_pregunta'    => $pos_items_segunda_pregunta,
            'pos_items_tercera_pregunta'    => $pos_items_tercera_pregunta,
            'pos_items_cuarta_pregunta'     => $pos_items_cuarta_pregunta,

        ];
    }

    function respondidasOtros($ficheroCSV){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');
        $fila = 1;
        $respondidas = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=27 && $fila<=31){
                $respondidas += (int)$linea[1];
            }
            $fila++;
        }
        fclose($file_handle);
        return $respondidas;
    }

    function preguntas_1_otros($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=27 && $fila<=31){
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
            if($fila>=37 && $fila<=37){
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
            if($fila>=39 && $fila<=43){
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
            if($fila>=45 && $fila<=49){
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

    function preguntas_2_otros($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=60 && $fila<=64){
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
            if($fila>=66 && $fila<=70){
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
            if($fila>=72 && $fila<=76){
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
            if($fila>=78 && $fila<=82){
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

    function preguntas_3_otros($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=93 && $fila<=97){
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
            if($fila>=99 && $fila<=103){
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
            if($fila>=105 && $fila<=109){
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
            if($fila>=111 && $fila<=115){
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

    function preguntas_4_otros($ficheroCSV,$respondidas){
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

?>