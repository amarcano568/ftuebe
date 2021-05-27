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

        header { position: fixed; 
        left: 0px; 
        top: -1em; 
        right: 0px; 
        height: 2em;
        text-align: center; }

        body {
            margin-top: 6em;
        }

        .otraPagina {
            page-break-before: always;
        }

        .otraPagina:last-child {
            page-break-before: never;
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
                    Correo-e: <a href="secretaria@ftuebe.es">secretaria@ftuebe.es</a><br>
                    Web: <a href="www.ftuebe.es">www.ftuebe.es</a>
                </p>
            </div>            
        </div>
    </footer>
    <main>       
        <div class="row">
            <div class="col-xs-12">
                <h3 class="text-center">NOTIFICACIÓN</h3>
             </div>
             <br><br><br>
             <div class="row">               
                <div class="col-xs-1"></div>
                <div class="col-xs-10">
                    <hr>
                    <p style="font-size: 18px;">
                        <strong>{{ $alumno->strNombre }} {{ $alumno->strApellidos }}</strong>, es un gusto saludarte y aprovechamos la ocasión para notificarte que
                        su alojamiento en la residencia de esta institución finaliza el día {{ $finaliza }} .                        
                    </p>
                </div>            
            </div>
            <br><br><br><br>
            <div class="row">
                <div class="col-xs-12 text-center" >
                    Sin más por el momento, me despido.
                </div>   
            </div>
            <br><br>
            <div class="row">
                <div class="col-xs-12 text-center" >
                    En Alcobendas (Madrid), a {{$fecha}}
                </div>   
            </div>
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col-xs-12 text-center" >
                    <h5><strong>D. Julio Díaz Piñeiro</strong></h5>
                    <h5>Rector de la FT - UEBE</h5>
                </div>   
            </div>
        </div>
    </main>
</body>

</html>