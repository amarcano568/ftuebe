<?php 

function posicionEnElExcelPas($periodo){

        switch ($periodo) {
            case '2016-2017':
                $respondidas    = 'O5';
                $personal       = 'O6';
                $pos_items_primera_pregunta = ['C4'];
                $pos_items_segunda_pregunta = ['C5','D5','E5','F5','G5','H5'];
                $pos_items_tercera_pregunta = ['C7','D7','E7','F7','G7','H7','I7','J7'];
                $pos_items_cuarta_pregunta  = ['C8','D8','E8','F8','G8','H8','I8','J8','K8'];
                break;
            case '2017-2018':
                $respondidas    = 'O14';
                $personal       = 'O15';
                $pos_items_primera_pregunta = ['C13'];
                $pos_items_segunda_pregunta = ['C14','D14','E14','F14','G14','H14'];
                $pos_items_tercera_pregunta = ['C16','D16','E16','F16','G16','H16','I16','J16'];
                $pos_items_cuarta_pregunta  = ['C17','D17','E17','F17','G17','H17','I17','J17','K17'];
                break; 
            case '2018-2019':
                $respondidas    = 'O23';
                $personal       = 'O24';
                $pos_items_primera_pregunta = ['C22'];
                $pos_items_segunda_pregunta = ['C23','D23','E23','F23','G23','H23'];
                $pos_items_tercera_pregunta = ['C25','D25','E25','F25','G25','H25','I25','J25'];
                $pos_items_cuarta_pregunta  = ['C26','D26','E26','F26','G26','H26','I26','J26','K26'];
                break;
            case '2019-2020':
                $respondidas    = 'O32';
                $personal       = 'O33';
                $pos_items_primera_pregunta = ['C31'];
                $pos_items_segunda_pregunta = ['C32','D32','E32','F32','G32','H32'];
                $pos_items_tercera_pregunta = ['C34','D34','E34','F34','G34','H34','I34','J34'];
                $pos_items_cuarta_pregunta  = ['C35','D35','E35','F35','G35','H35','I35','J35','K35']; 
                break;
            case '2020-2021':
                $respondidas    = 'O41';
                $personal       = 'O42';
                $pos_items_primera_pregunta = ['C40'];
                $pos_items_segunda_pregunta = ['C41','D41','E41','F41','G41','H41'];
                $pos_items_tercera_pregunta = ['C43','D43','E43','F43','G43','H43','I43','J43'];
                $pos_items_cuarta_pregunta  = ['C44','D44','E44','F44','G44','H44','I44','J44','K44']; 
                break;
            case '2021-2022':
                $respondidas    = 'O50';
                $personal       = 'O51';
                $pos_items_primera_pregunta = ['C49'];
                $pos_items_segunda_pregunta = ['C50','D50','E50','F50','G50','H50'];
                $pos_items_tercera_pregunta = ['C52','D52','E52','F52','G52','H52','I52','J52'];
                $pos_items_cuarta_pregunta  = ['C53','D53','E53','F53','G53','H53','I53','J53','K53'];  
                break;
            case '2022-2023':
                $respondidas    = 'O59';
                $personal       = 'O60';
                $pos_items_primera_pregunta = ['C58'];
                $pos_items_segunda_pregunta = ['C59','D59','E59','F59','G59','H59'];
                $pos_items_tercera_pregunta = ['C61','D61','E61','F61','G61','H61','I61','J61'];
                $pos_items_cuarta_pregunta  = ['C62','D62','E62','F62','G62','H62','I62','J62','K62']; 
                break;
            case '2023-2024':
                $respondidas    = 'O68';
                $personal       = 'O69';
                $pos_items_primera_pregunta = ['C67'];
                $pos_items_segunda_pregunta = ['C68','D68','E68','F68','G68','H68'];
                $pos_items_tercera_pregunta = ['C70','D70','E70','F70','G70','H70','I70','J70'];
                $pos_items_cuarta_pregunta  = ['C71','D71','E71','F71','G71','H71','I71','J71','K71'];        
                break;
            case '2024-2025':
                $respondidas    = 'O77';
                $personal       = 'O78';
                $pos_items_primera_pregunta = ['C76'];
                $pos_items_segunda_pregunta = ['C77','D77','E77','F77','G77','H77'];
                $pos_items_tercera_pregunta = ['C79','D79','E79','F79','G79','H79','I79','J79'];
                $pos_items_cuarta_pregunta  = ['C80','D80','E80','F80','G80','H80','I80','J80','K80']; 
                break;
            case '2025-2026':
                $respondidas    = 'O86';
                $personal       = 'O87';
                $pos_items_primera_pregunta = ['C85'];
                $pos_items_segunda_pregunta = ['C86','D86','E86','F86','G86','H86'];
                $pos_items_tercera_pregunta = ['C88','D88','E88','F88','G88','H88','I88','J88'];
                $pos_items_cuarta_pregunta  = ['C89','D89','E89','F89','G89','H89','I89','J89','K89'];           
                break;
            case '2026-2027':
                $respondidas    = 'O95';
                $personal       = 'O96';
                $pos_items_primera_pregunta = ['C94'];
                $pos_items_segunda_pregunta = ['C95','D95','E95','F95','G95','H95'];
                $pos_items_tercera_pregunta = ['C97','D97','E97','F97','G97','H97','I97','J97'];
                $pos_items_cuarta_pregunta  = ['C98','D98','E98','F98','G98','H98','I98','J98','K98'];  
                break;
        
        }

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
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=22 && $fila<=26){
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

    function preguntas_2_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=37 && $fila<=41){
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
            if($fila>=43 && $fila<=47){
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
            if($fila>=49 && $fila<=53){
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
            if($fila>=55 && $fila<=59){
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
            if($fila>=61 && $fila<=65){
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
            if($fila>=67 && $fila<=71){
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

    function preguntas_3_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=77 && $fila<=81){
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
            if($fila>=83 && $fila<=87){
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
            if($fila>=89 && $fila<=93){
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
            if($fila>=95 && $fila<=99){
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
            if($fila>=101 && $fila<=105){
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
            if($fila>=107 && $fila<=111){
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
            if($fila>=113 && $fila<=117){
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
            if($fila>=119 && $fila<=123){
                $alumnos = (int)$linea[1];
                $valor = (int)str_replace('%','',$linea[2]);
                $media = ($alumnos*$valor)/$respondidas;
                $item8 += ($media*5)/100;
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
        ];
    }

    function preguntas_4_pas($ficheroCSV,$respondidas){
        $csvFile = storage_path('app/' . $ficheroCSV);
        $file_handle = fopen($csvFile, 'r');

        /* Item 1 */
        $fila = 1;
        $item1 = 0;
        while (!feof($file_handle)) {
            $linea = fgetcsv($file_handle, 0, ';');
            if($fila>=129 && $fila<=133){
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
            if($fila>=135 && $fila<=139){
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
            if($fila>=141 && $fila<=145){
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
            if($fila>=147 && $fila<=151){
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
            if($fila>=153 && $fila<=157){
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
            if($fila>=159 && $fila<=163){
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
            if($fila>=165 && $fila<=169){
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
            if($fila>=171 && $fila<=175){
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
            if($fila>=177 && $fila<=181){
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