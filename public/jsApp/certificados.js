$(document).on("ready", function() {
    var server = "";
    var pathname = document.location.pathname;
    var pathnameArray = pathname.split("/public/");
    var archivoPdf = "";
    var inpcChange = false;
    var arreglo = [
            'inf-mobiliario-habitacion',
            'inf-mobiliario-total',
            'inf-ocupacion-hab-entre-fecha',
            'inf-hab-desocupadas-entre-fechas',
            'inf-hab-ocupadas-entre-fechas',
        ];

    server = pathnameArray.length > 0 ? pathnameArray[0] + "/public/" : "";
    $(".chosen-select").chosen(ConfigChosen());

    $(document).on("click", "#btn-generar-pdf", function(event) {
        event.preventDefault();
        id_alumno = $("#id_alumno").val();
        tipo_certificado = $("#tipo_certificado").val();
        mes = $("#mes_filtro").val();
        ano = $("#ano_filtro").val();

        if (id_alumno == "" && $.inArray(tipo_certificado, arreglo)<0){
            alertify.error('<i class="fa-2x far fa-meh"></i><br>Debe seleccionar un alumno');
            return false;
        }
        if (tipo_certificado == ""){
            alertify.error('<i class="fa-2x far fa-meh"></i><br>Debe seleccionar un tipo de certificado, informe o notificación');
            return false;
        }
        if ( (tipo_certificado == "not-incumpliento-tarea-asignada" && mes == '') || (tipo_certificado == "not-incumpliento-tarea-asignada" && ano == '') ){
            alertify.error('<i class="fa-2x far fa-meh"></i><br>Debe seleccionar el mes y año');
            return false;
        }
     
        var form = $("#form-pdf-certificados");
        var formData = form.serialize();

        $.ajax({
            url: "certificados-pdf",
            type: "post",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                loadingUI("Pdf imputar trabajo");
            }
        })
            .done(function(response) {
                console.log(response);
                if (response.success){
                    archivoPdf = response.data;
                    $("#ObjPdf").attr("src", response.data);   
                    alertify.success(response.message);
                    deleteFile(response.data);
                }else{
                    alertify.error(response.message);
                    $("#ObjPdf").attr("src", ''); 
                }
                            
                $.unblockUI();
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(statusCode);
                ajaxError(statusCode, errorThrown);
            });
    });

    $(document).on("click", ".btn-enviar-correo", function(event) {
        uuid = $("#uuid-pension").val();
        idCliente = $("#idCliente").val();
        $.ajax({
            url: "/send-mail-detalle",
            type: "get",
            data: { uuid: uuid, idCliente: idCliente, archivoPdf: archivoPdf },
            dataType: "json",
            beforeSend: function() {
                loadingUI("Enviando correo");
            }
        })
            .done(function(response) {
                console.log(response);
                $.unblockUI();
                if (response.success === true) {
                    alertify.success(response.mensaje);
                } else {
                    alertify.error(response.mensaje);
                }
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });
    });

    $(document).on("change", "#tipo_certificado", function(event) {
        event.preventDefault();
        $(".datos_adicionales").hide();
        tipo = $(this).val();
        $("#"+tipo).show();
        $("#filtro_alumno").show();
        if ($.inArray(tipo, arreglo)>=0){
            $("#filtro_alumno").hide();
        }
    });

    $(document).on("change", "#id_alumno", function(event) {
        event.preventDefault();
        tipo = $("#tipo_certificado").val();
        if ( tipo != 'not-asignacion-alojamiento' ){
            return false;
        }        
        if ( tipo != 'not-finalizacion-alojamiento' ){
            return false;
        } 
        if ( $(this).val() == '' ){
            return false;
        }  
        $(".datos_adicionales").hide();
        $("#"+tipo).show();
        $("#filtro_alumno").show();
        $.ajax({
            url: "verificar-alojamiento-alumno",
            type: "post",
            data: { 
                id_alumno: $(this).val(),
                _token: $('meta[name="csrf-token"]').attr('content'),
             },
            dataType: "json",
            beforeSend: function() {
                loadingUI("Verificar hospedaje alumno.");
            }
        })
            .done(function(response) {
                console.log(response);
                $.unblockUI();               
                if (response.success === true) {
                    alertify.success(response.message);
                    $("#notifica_numero_hab").val(response.data.num_habitacion);
                    $("#notifica_desde_hab").val(response.data.desde);
                    $("#notifica_hasta_hab ").val(response.data.hasta);
                } else {
                    alertify.error(response.message);
                    $("#notifica_numero_hab").val('');
                    $("#notifica_desde_hab").val('');
                    $("#notifica_hasta_hab ").val('');
                }    
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

    });

    
});
