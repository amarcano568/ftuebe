$(document).on("ready", function() {
    var server = "";
    var pathname = document.location.pathname;
    var pathnameArray = pathname.split("/public/");
    $(".card-resultados").hide();
    $(".periodo-cohorte").hide();

    server = pathnameArray.length > 0 ? pathnameArray[0] + "/public/" : "";
    $(".chosen-select").chosen(ConfigChosen());

    $("#migas-pan").html(
        '<ol class="breadcrumb border-0 m-0">' +
            '<li class="breadcrumb-item">Home</li>' +
            '<li class="breadcrumb-item">Indicadores-Sastifacción</li>' +
            '<li class="breadcrumb-item active">Informe final</li>' +
            "</ol>"
    );

    $(document).on("change", "#informe", function (event) {
        event.preventDefault();
        informe = $(this).val();
        $(".periodo-cohorte").hide();
        $('.chosen-select').prop('required',false);
        if (informe == "indicadores"){
            $("#div-cohorte").show();
            $('#cohorte').prop('required',true);
        }else{
            $("#div-periodo").show();
            $('#periodo').prop('required',true);
        }

    });

    
    $(document).on("click", "#btn-generar-informe-final", function (event) {
        event.preventDefault();

        valida1 = $("#informe")
        .parsley()
        .validate();
        valida2 = $("#periodo")
        .parsley()
        .validate();
        valida3 = $("#cohorte")
        .parsley()
        .validate();   
        valida4 = $("#tipo_estudio")
        .parsley()
        .validate();                 

        if (valida1 !== true || valida2 !== true || valida3 !== true || valida4 !== true) {
            return false;
        }

        $(".card-resultados").hide();
        tipo = $("#informe").val();
        if (tipo == "indicadores"){
            $("#card-indicadores").show();   
            $("#text-cohorte").text($("#cohorte").val())
        }else if(tipo == 'alumnos'){
            $("#card-alumnos").show();
        }else if(tipo == 'profesores'){
            $("#card-profesores").show();
        }else if(tipo == 'pas'){
            $("#card-pas").show();
        }else if(tipo == 'egresados'){
            $("#card-egresados").show();
        }else if(tipo == 'empleadores'){
            $("#card-empleadores").show();
        }

        $('#tipo_estudio').prop('required',true);

        $.ajax({
            url: "generar-informe-final",
            type: "post",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                informe: $("#informe").val(),
                periodo: $("#periodo").val(),
                cohorte: $("#cohorte").val(),
                tipo_estudio: $("#tipo_estudio").val(),               
            },
            dataType: "json",
            // beforeSend: function() {
            //     loadingUI("...");                
            // }
        })
            .done(function(response) {
                console.log(response); 
                if (response.success){                        

                    if (tipo == "indicadores"){
                        $("#tasa-graduacion").text(response.data.dato1+'%');
                        $("#tasa-abandono").text(response.data.dato2+'%');
                        $("#tasa-eficiencia").text(response.data.dato3+'%');
                        $("#tasa-rendimiento").text(response.data.dato4+'%');
                        $("#satisfaccion-del-estudiante-con-el-titulo").text(response.data.dato5+'%');
                        $("#satisfaccion-del-estudiante-con-el-profesorado").text(response.data.dato6+'%');
                        $("#satisfaccion-del-profesorado-con-el-titulo").text(response.data.dato7+'%');
                    }else if(tipo == 'alumnos'){
                        $("#alumnado-pregunta-1").text(response.data.dato1+'%');
                        $("#alumnado-pregunta-2").text(response.data.dato2+'%');
                        $("#alumnado-pregunta-3").text(response.data.dato3+'%');
                        $("#alumnado-pregunta-4").text(response.data.dato4+'%');
                        $("#alumnado-pregunta-5").text(response.data.dato5+'%');
                        $("#alumnado-pregunta-6").text(response.data.dato6+'%');
                        $("#alumnado-pregunta-7").text(response.data.dato7+'%');
                    }else if(tipo == 'profesores'){
                        $("#profesores-pregunta-1").text(response.data.dato1+'%');
                        $("#profesores-pregunta-2").text(response.data.dato2+'%');
                        $("#profesores-pregunta-3").text(response.data.dato3+'%');
                        $("#profesores-pregunta-4").text(response.data.dato4+'%');
                    }else if(tipo == 'pas'){
                        $("#pas-pregunta-1").text(response.data.dato1+'%');
                        $("#pas-pregunta-2").text(response.data.dato2+'%');
                        $("#pas-pregunta-3").text(response.data.dato3+'%');
                        $("#pas-pregunta-4").text(response.data.dato4+'%');
                    }else if(tipo == 'egresados'){
                        $("#egresados-pregunta-1").text(response.data.dato1+'%');
                        $("#egresados-pregunta-2").text(response.data.dato2+'%');
                        $("#egresados-pregunta-3").text(response.data.dato3+'%');
                        $("#egresados-pregunta-4").text(response.data.dato4+'%');
                        $("#egresados-pregunta-5").text(response.data.dato5+'%');
                    }else if(tipo == 'empleadores'){
                    }
                                        
                    var link = document.createElement("a");
                    link.href = response.fichero;
                    link.download = 'Informe '+$("#informe").val();
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    alertify.success(
                        response.message
                    );
                }else{
                    alertify.error(
                        response.message
                    );
                }
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

    });
    
    
});
