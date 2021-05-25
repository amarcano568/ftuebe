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
        <center>
            <h4 class=" text-uppercase">Informe de mobiliario por habitación</h4>
        </center>
        <hr>
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
            <div class="col-sm-12">
 
                @foreach ($mobiliario_totales as $item) 
                                     
                       <div class="row">
                            <div class="col-xs-8">
                                <h5>* <strong>{{ $item['mobiliario'] }}</strong></h5>
                            </div>
                            <div class="col-xs-2">
                                <h5>Total: <strong>{{ $item['total'] }}</strong></h5>
                            </div>
                        </div>

                @endforeach

            </div>

        </div>
        

        
    </main>
</body>

</html>