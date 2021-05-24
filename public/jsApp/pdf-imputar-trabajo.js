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

        var form = $("#form-pdf-imputar-trabajo");
        var formData = form.serialize();
        $.ajax({
            url: "ver-pdf-imputar-trabajo",
            type: "post",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                loadingUI("Pdf imputar trabajo");
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

    $(document).on("click", "#btn-ipnc", function(event) {
        event.preventDefault();
        $("#modal-inpc").modal("show");
    });

    $(document).on("change", "#salario-diario-nivel-vida", function(event) {
        event.preventDefault();
        calculaNivelVida();
    });

    function calculaNivelVida() {
        uuid = $("#uuid-pension").val();
        idCliente = $("#idCliente").val();
        inpcMesOriginal = $("#inpc-mes-original").val();
        inpcMesActual = $("#inpc-mes-actual").val();
        salarioDiarioNivelVida = $("#salario-diario-nivel-vida").val();
        empresaNivelVida = $("#empresa-nivel-vida").val();
        fechaNivelvida = $("#fecha-nivel-vida").val();
        $.ajax({
            url: "/change-view-nivel-vida",
            type: "get",
            data: {
                uuid: uuid,
                idCliente: idCliente,
                inpcMesOriginal: inpcMesOriginal,
                inpcMesActual: inpcMesActual,
                salarioDiarioNivelVida: salarioDiarioNivelVida,
                empresaNivelVida: empresaNivelVida,
                fechaNivelvida: fechaNivelvida
            },
            dataType: "json",
            beforeSend: function() {
                loadingUI("Enviando correo");
            }
        })
            .done(function(response) {
                console.log(response);
                $.unblockUI();
                $("#principalPanel")
                    .empty()
                    .append($(response));
                inpcChange = false;
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown, "INPC");
            });
    }

    $(document).on("click", "#btn-cerrar-modal-inpc", function(event) {
        event.preventDefault();
        inpcOriginal = $("#inpc-mes-original").val();
        inpcActual = $("#inpc-mes-actual").val();
        valida = $("#form-modal-inpc")
            .parsley()
            .validate();
        if (valida === false) {
            alertify.set("notifier", "position", "top-center");
            alertify.error(
                '<i class="fas fa-exclamation-triangle"></i><br>Por favor agregar el los valores <strong>INPC</strong>.'
            );
            return false;
        } else {
            if (inpcChange) {
                calculaNivelVida();
            }
            $("#modal-inpc").modal("hide");
            cierraModal();
        }
    });

    $(document).on("change", "#inpc-mes-original,#inpc-mes-actual", function(
        event
    ) {
        event.preventDefault();
        inpcChange = true;
    });
});
