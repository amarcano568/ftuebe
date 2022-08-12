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
                    $("#tasa-graduacion").text(response.data.dato1);
                    $("#tasa-abandono").text(response.data.dato2);
                    $("#tasa-eficiencia").text(response.data.dato3);
                    $("#tasa-rendimiento").text(response.data.dato4);

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
