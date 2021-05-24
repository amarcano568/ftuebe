$(document).on("ready", function() {
    var dt_table_trabajos_imputados = "";

    

    $(".chosen-select").chosen(ConfigChosen());

    $("#migas-pan").html(
        '<ol class="breadcrumb border-0 m-0">' +
            '<li class="breadcrumb-item">Home</li>' +
            '<li class="breadcrumb-item">Tareas</li>' +
            '<li class="breadcrumb-item active">Asignar Tarea</li>' +
            "</ol>"
    );

    $(document).on("change", "#id_alumno", function (event) {
      id_alumno = $(this).val();     
      $.ajax({
        url: 'buscar-tareas-asignadas',
        type: "post",
        data: {
            id_alumno: id_alumno,            
        },
        dataType: "json",
        beforeSend: function() {
            loadingUI("Buscando tareas asignadas");
        }
    })
        .done(function(response) {
            console.log(response);
            if (response.success === true) {
                alertify.success(
                    response.message
                );
            } else {
                alertify.error(
                    response.message
                );
            }
            
            $.unblockUI();
        })
        .fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });
    });

        $(document).on("click", "#btn-guardar-trabajo", function(event) {

        $.ajax({
            url: 'guardar-imputado',
            type: "post",
            data: {
                id_alumno_trabajo: $("#id_alumno_trabajo").val(),
                trabajo_id: $("#trabajo_id").val(),
                fecha_trabajo: $("#fecha_trabajo").val(),
                observaciones_trabajo: $("#observaciones_trabajo").val(),
                _token: $('meta[name="csrf-token"]').attr('content'),
                hora_inicio: $("#hora_inicio").val(),
                hora_fin: $("#hora_fin").val(),
            },
            dataType: "json",
            beforeSend: function() {
                loadingUI("Actualizando los trabajos realizados");
            }
        })
            .done(function(response) {
                console.log(response);
                if (response.success === true) {
                    alertify.success(
                        response.message
                    );
                } else {
                    alertify.error(
                        response.message
                    );
                }
                dt_table_trabajos_imputados.ajax.reload();
                $("#observaciones_trabajo").val('');
                $.unblockUI();
            })
            .fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });
    });

    
    

});
