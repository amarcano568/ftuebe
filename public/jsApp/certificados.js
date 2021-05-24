$(document).on("ready", function() {
    var server = "";
    var pathname = document.location.pathname;
    var pathnameArray = pathname.split("/public/");
    var archivoPdf = "";
    var inpcChange = false;

    server = pathnameArray.length > 0 ? pathnameArray[0] + "/public/" : "";
    $(".chosen-select").chosen(ConfigChosen());

    $(document).on("click", "#btn-generar-pdf", function(event) {
        event.preventDefault();
        id_alumno = $("#id_alumno").val();
        tipo_certificado = $("#tipo_certificado").val();

        if (id_alumno == ""){
            alertify.error('<i class="fa-2x far fa-meh"></i><br>Debe seleccionar un alumno');
            return false;
        }
        if (tipo_certificado == ""){
            alertify.error('<i class="fa-2x far fa-meh"></i><br>Debe seleccionar un tipo de certificado');
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
                }else{
                    alertify.error(response.message);
                    $("#ObjPdf").attr("src", ''); 
                }
                            
                $.unblockUI();
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
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
    });

    
});
