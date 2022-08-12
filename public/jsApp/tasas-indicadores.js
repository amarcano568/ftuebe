$(document).on("ready", function() {
    var server = "";
    var pathname = document.location.pathname;
    var pathnameArray = pathname.split("/public/");
   

    server = pathnameArray.length > 0 ? pathnameArray[0] + "/public/" : "";
    $(".chosen-select").chosen(ConfigChosen());

    $("#migas-pan").html(
        '<ol class="breadcrumb border-0 m-0">' +
            '<li class="breadcrumb-item">Home</li>' +
            '<li class="breadcrumb-item">Indicadores-Tasas SIGC</li>' +
            '<li class="breadcrumb-item active">Tasas SIGC</li>' +
            "</ol>"
    );

    
    $(document).on("click", "#btn-imprimir-tasas", function(event) {
        event.preventDefault();

        tasaGraduacion = $("#tasa-graduacion").text();
        tasaAbandono = $("#tasa-abandono").text();
        tasaEficiencia = $("#tasa-eficiencia").text();
        tasaExito = $("#tasa-exito").text();
        tasaRendimiento = $("#tasa-rendimiento").text();
        duracionMediaEstudio = $("#duracion-media-estudio").text();
        tdGraduados4año = $("#td-graduados-4-año").text();
        tdGraduadosPeriodo = $("#td-graduados-periodo").text();
        tdTotalAlumnosCohortes = $("#td-total-alumnos-cohortes").text();
        tdNroAlumnosNoMatriculados = $("#td-nro_alumnos-no-matriculados").text();
        tdNroTotalCreditos = $("#td-nro-total-creditos").text();
        tdTotalCreCohorteSaliente = $("#td-total-cre-cohorte-saliente").text();
        tdTotalCreNoAdapConvRec = $("#td-total-cre-no-adap-conv-rec").text();
        tdTotalCreditosPresentadosExamen = $("#td-total-creditos-presentados-examen").text();
        tdNroAlumnosTerminan4Anos = $("#td-nro-alumnos-terminan-4-anos").text();
        tdNroAlumnosTerminan5Anos = $("#td-nro-alumnos-terminan-5-anos").text();
        tdNroAlumnosTerminan6Anos = $("#td-nro-alumnos-terminan-6-anos").text();

        data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            tasaGraduacion: tasaGraduacion,
            tasaAbandono: tasaAbandono,
            tasaEficiencia: tasaEficiencia,
            tasaExito: tasaExito,
            tasaRendimiento: tasaRendimiento,
            duracionMediaEstudio: duracionMediaEstudio,
            tdGraduados4año: tdGraduados4año,
            tdGraduadosPeriodo: tdGraduadosPeriodo,
            tdTotalAlumnosCohortes: tdTotalAlumnosCohortes,
            tdNroAlumnosNoMatriculados: tdNroAlumnosNoMatriculados,
            tdNroTotalCreditos: tdNroTotalCreditos,
            tdTotalCreCohorteSaliente: tdTotalCreCohorteSaliente,
            tdTotalCreNoAdapConvRec: tdTotalCreNoAdapConvRec,
            tdTotalCreditosPresentadosExamen: tdTotalCreditosPresentadosExamen,
            tdNroAlumnosTerminan4Anos: tdNroAlumnosTerminan4Anos,
            tdNroAlumnosTerminan5Anos: tdNroAlumnosTerminan5Anos,
            tdNroAlumnosTerminan6Anos: tdNroAlumnosTerminan6Anos,
        }

        $.ajax({
            url: "imprimir-pdf-indicadores-resumen",
            type: "post",
            data: data,
            dataType: "json",
            beforeSend: function() {
                loadingUI("Pdf imputar trabajo");
            }
        })
            .done(function(response) {
                console.log(response);          
                archivoPdf = response.data;
                $("#ObjPdf").attr("src", response.data);   
                alertify.success(response.message);
                deleteFile(response.data); 
                $("#modal-tasa-indicadores").modal('show');
                $.unblockUI();
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(statusCode);
                ajaxError(statusCode, errorThrown);
            });
        
    });

    $(document).on("click", "#btn-generar-indicadores", function(event) {
        event.preventDefault();

        valida1 = $("#periodo").parsley().validate();
        console.log(valida1)
        if (valida1 !== true) {
            return false;
        }

        valida2 = $("#tipo_estudio").parsley().validate();
        if (valida2 !== true) {
            return false;
        }
        $(".espera-cargando").html('<h6 class="text-danger text-center">Espere, generando las Tasas-indicadores</h6>');
        $("#div-datos-finales").hide();
        periodo = $("#periodo").val();
        tipo_estudio = $("#tipo_estudio").val();
        $.ajax({
            url: "ver-indicadores-tasas",
            type: "post",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
               'periodo': periodo,
               'tipo_estudio': tipo_estudio,
            },
            dataType: "json",
            beforeSend: function() {
                loadingUI("Pdf tareas realizadas");
                $("#div-datos-finales").show();
            }
        })
            .done(function(response) {
                console.log(response);
                $("#table1").html(response.table1);
                resumen_table("#body-table-1","#table_1",true);

                $("#table2").html(response.table2);
                resumen_table("#body-table-2","#table_2",false);

                $("#table3").html(response.table3);
                resumen_table("#body-table-3","#table_3");

                $("#td-nro-total-creditos").html(response.nro_total_creditos);

                $.unblockUI();
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

    });

    function resumen_table(body,id,sw){
        var filas = $(body).find("tr"); //devuelve las filas del body de tu tabla 
        alumnos_terminan_4_anos = 0;
        alumnos_terminan_5_anos = 0;
        alumnos_terminan_6_anos = 0;
        tot_creditos_ano_1 = 0;
        tot_creditos_ano_2 = 0;
        tot_creditos_ano_3 = 0;
        tot_creditos_ano_4 = 0;
        tot_creditos_ano_5 = 0;
        tot_creditos_ano_6 = 0;
        total = 0;
        contador = 0;
        for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
            var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila  
            
            tot_creditos_ano_1  += $(celdas[3]).text() != '' ? parseInt($(celdas[3]).text()) : 0;    
            tot_creditos_ano_2  += $(celdas[4]).text() != '' ? parseInt($(celdas[4]).text()) : 0;    
            tot_creditos_ano_3  += $(celdas[5]).text() != '' ? parseInt($(celdas[5]).text()) : 0;    
            tot_creditos_ano_4  += $(celdas[6]).text() != '' ? parseInt($(celdas[6]).text()) : 0;    
            tot_creditos_ano_5  += $(celdas[7]).text() != '' ? parseInt($(celdas[7]).text()) : 0;     
            tot_creditos_ano_6  += $(celdas[8]).text() != '' ? parseInt($(celdas[8]).text()) : 0;     

            creditos_4_anos  = parseInt($(celdas[6]).text());          
            creditos_5_anos  = parseInt($(celdas[7]).text());   
            creditos_6_anos  = parseInt($(celdas[8]).text());   

            alumnos_terminan_4_anos += creditos_4_anos > 0 ? 1 : 0;
            alumnos_terminan_5_anos += creditos_5_anos > 0 ? 1 : 0;
            alumnos_terminan_6_anos += creditos_6_anos > 0 ? 1 : 0;
            tot = $(celdas[9]).text();
            if (tot != ""){
                total += parseInt(tot);  
            }
            contador++;
        }

        if(sw){
            tot_alumnos =  parseInt(contador)-5;
            $(id+"_4_anos").html('<strong>'+alumnos_terminan_4_anos+'</strong>');
            $(id+"_5_anos").html('<strong>'+alumnos_terminan_5_anos+'</strong>');
            $(id+"_6_anos").html('<strong>'+alumnos_terminan_6_anos+'</strong>');        
            
            $("#alumnos_cohortes").html('<strong>'+tot_alumnos+'</strong>');
            $("#alumnos_graduados_4").html('<strong>'+(alumnos_terminan_4_anos-alumnos_terminan_5_anos)+'</strong>');
            $("#alumnos_graduados_5").html('<strong>'+alumnos_terminan_5_anos+'</strong>');
            $("#alumnos_graduados_6").html('<strong>'+alumnos_terminan_6_anos+'</strong>');                

            $("#td-graduados-4-año").html(alumnos_terminan_4_anos-alumnos_terminan_5_anos);
            $("#td-graduados-periodo").html(alumnos_terminan_4_anos-alumnos_terminan_5_anos);
            $("#td-total-alumnos-cohortes").html(tot_alumnos);
            periodo = $("#periodo").val();        
            ano = periodo.split("-")
            $("#periodo-graduacion").html(periodo);
            $("#periodo-ano-1").html(ano[0]);
            alumnos_abandonan = parseInt($("#total-abandonan").text());        
            $("#nro_alumnos_no_matriculados").html(tot_alumnos-alumnos_terminan_5_anos-alumnos_abandonan);
            $("#td-nro_alumnos-no-matriculados").html(tot_alumnos-alumnos_terminan_5_anos-alumnos_abandonan);
            $("#td-total-cre-cohorte-saliente").html(total);
            $("#td-nro-alumnos-terminan-4-anos").html((alumnos_terminan_4_anos-alumnos_terminan_5_anos));
            $("#td-nro-alumnos-terminan-5-anos").html(alumnos_terminan_5_anos);
            $("#td-nro-alumnos-terminan-6-anos").html(alumnos_terminan_6_anos);

        }

        /** Total Creditos anuales */
        $(id+"_ano_1").html('<strong>'+tot_creditos_ano_1+'</strong>');
        $(id+"_ano_2").html('<strong>'+tot_creditos_ano_2+'</strong>');
        $(id+"_ano_3").html('<strong>'+tot_creditos_ano_3+'</strong>');
        $(id+"_ano_4").html('<strong>'+tot_creditos_ano_4+'</strong>');
        $(id+"_ano_5").html('<strong>'+tot_creditos_ano_5+'</strong>');
        $(id+"_ano_6").html('<strong>'+tot_creditos_ano_6+'</strong>');
        $(id+"_total").html('<strong>'+total+'</strong>');

        if(id == "#table_2"){
            $("#td-total-cre-no-adap-conv-rec").html(total)
        }

        if(id == "#table_3"){
            $("#td-total-creditos-presentados-examen").html(total)
            b19 = alumnos_terminan_4_anos-alumnos_terminan_5_anos;
            b26 = alumnos_terminan_4_anos;
            b27 = alumnos_terminan_5_anos;
            b28 = alumnos_terminan_6_anos;
            b20 = tot_alumnos
            b21 = tot_alumnos-alumnos_terminan_5_anos-alumnos_abandonan
            b23 =  parseInt($("#table_1_total").text());
            b24 = parseInt($("#table_2_total").text());
            b25 = parseInt($("#table_3_total").text());
            
            tasa_graduacion = (( ( b19 +b28) * 100) / b20).toFixed(2);
            tasa_abandono = ((b21/b20)*100).toFixed(2);
            tasa_eficiencia = '0';
            tasa_exito = ((( b24 * 100 ) / b25)).toFixed(2);
            tasa_rendimiento = ((b24/b23)*100).toLocaleString('en-US', {maximumFractionDigits: 2});
            duracion_media_estudio = (((b26*4)+(b27*5)+(b28*6))/(b26+b27+b28)).toLocaleString('en-US', {maximumFractionDigits: 2})

            $("#tasa-graduacion").html(tasa_graduacion+'%');
            $("#tasa-abandono").html(tasa_abandono+'%');
            $("#tasa-eficiencia").html(tasa_eficiencia);
            $("#tasa-exito").html(tasa_exito+'%');
            $("#tasa-rendimiento").html(tasa_rendimiento+'%');
            $("#duracion-media-estudio").html(duracion_media_estudio+'%');

            guardar_indicadores_principales(tasa_graduacion,tasa_abandono,tasa_eficiencia,tasa_exito,tasa_rendimiento,duracion_media_estudio);
        }

    }

    function guardar_indicadores_principales(tasa_graduacion,tasa_abandono,tasa_eficiencia,tasa_exito,tasa_rendimiento,duracion_media_estudio){
        estudio = $("#tipo_estudio").val();
        estudio = estudio == 8 ? 'grado-oficial' : 'master-oficial';
        periodo = $("#periodo").val();
        $.ajax({
            url: "guardar-indicadores-principales",
            type: "post",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                estudio: estudio,
                periodo: periodo,
                tasa_graduacion: tasa_graduacion,
                tasa_abandono: tasa_abandono,
                tasa_eficiencia: tasa_eficiencia,
                tasa_exito: tasa_exito,
                tasa_rendimiento: tasa_rendimiento,
                duracion_media_estudio: duracion_media_estudio
            },
            dataType: "json",
            // beforeSend: function() {
            //     loadingUI("...");                
            // }
        })
            .done(function(response) {
                console.log(response);               
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });
    }
    
});
