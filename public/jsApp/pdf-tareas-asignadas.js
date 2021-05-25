$(document).on("ready", function() {
    
    $(".chosen-select").chosen(ConfigChosen());

    $(document).on("click", "#btn-generar-pdf", function(event) {
        event.preventDefault();

        var form = $("#form-pdf-tareas-asignadas");
        var formData = form.serialize();
        $.ajax({
            url: "ver-pdf-tareas-asignadas",
            type: "post",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                loadingUI("Pdf tareas realizadas");
            }
        })
            .done(function(response) {
                console.log(response);
                archivoPdf = response.data;
                $("#ObjPdf").attr("src", response.data);               
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
   
});
