<html>

<head>
    <link href="{{ asset('css/bootstrap-3-simple.min.css') }}" rel="stylesheet" />
    <style>
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
        }

        body {
            margin-top: -7.5px;
        }

        .otraPagina {
            page-break-before: always;
        }

        .otraPagina:last-child {
            page-break-before: never;
        }

        td {
            padding: 0.10em !important;
            height: 1.30em;
            border: 1px solid grey;
            border-top-color: 1px solid grey;
        }

        th {
            padding: 0.10em !important;
            height: 1.30em;
            border: 1px solid grey;
            border-top-color: 1px solid grey;
        }

        table {
            border-collapse: collapse;
        }


        .input-xs {
            height: 22px;
            padding: 2px 5px;
            font-size: 12px;
            line-height: 1.5;
            /* If Placeholder of the input is moved up, rem/modify this. */
            border-radius: 3px;
        }        
        .page-number:before {
        content: "Pág: " counter(page);
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-xs-2">
                <img src="img/logo_vertical.png" alt="" width="100%">
            </div>
            <div class="col-xs-8 text-center">
                <h3><strong>FACULTAD DE TEOLOGÍA</strong></h3>
                <h4><strong>UNIÓN EVANGÉLICA BAUTISTA DE ESPAÑA</strong></h4>
                <h5>“Capacitando para el ministerio cristiano desde 1922” (Ef. 4:12)</h5>
            </div>
        </div>
    </header>
    <footer>
        <div class="row">
            <hr>
            <div class="col-xs-12">
                <p style="font-size: 12px;" class="text-center">
                    Entidad inscrita en el Registro de Universidades, Centros y Títulos (RUCT) del<br>
                    Ministerio de Educación con el núm. 28053204<br>
                    C/ Marqués de la Valdavia, 134. 28100 Alcobendas (Madrid)<br>
                    Tfno. 916.624.099 – Fax. 916.624.098 - 916.624.092 (residencia)<br>
                    Correo-e: secretaria@ftuebe.es<br>
                    Web: www.ftuebe.es<br>
                </p>
            </div>
            
        </div>
    </footer>
    <main>
        <center>
            <h3 class=" text-uppercase">Listado de tareas asignadas</h3>
        </center>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                @foreach ($data as $item)
                    <h4><strong>{{ $item['nombre'] }}</strong></h4>
                    @foreach ($item['tarea'] as $row)
                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;{{ $row['tarea'] }}</h5>       
                    @endforeach   
                    <hr>                                                             
                @endforeach
            </div>                    
        </div>       
    </main>
</body>

</html>