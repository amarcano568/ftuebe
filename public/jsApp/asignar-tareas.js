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
      if (id_alumno == ''){
          return false;
      }
      $.ajax({
        url: 'buscar-tareas-asignadas',
        type: "post",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
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
                tareas = response.data
                tareas = tareas.split('|');
                $("#tareas_asignadas").val(tareas).trigger("chosen:updated");
            } else {
                alertify.error(
                    response.message
                );
                $("#tareas_asignadas").val('').trigger("chosen:updated");
            }
            
            $.unblockUI();
        })
        .fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });
    });

    $("#form-tareas-asignadas")
    .parsley()
    .on("field:validated", function() {
        var ok = $(".parsley-error").length === 0;
        $(".bs-callout-info").toggleClass("hidden", !ok);
        $(".bs-callout-warning").toggleClass("hidden", ok);
    })
    .on("form:submit", function() {
        return true;
    });

$("#form-tareas-asignadas").submit(function(e) {
    e.preventDefault();
    var form = $("#form-tareas-asignadas");
    var formData = form.serialize();
    var route = form.attr("action");
    $.ajax({
        url: route,
        type: "post",
        data: formData,
        dataType: "json",
        beforeSend: function() {
            loadingUI("Actualizando la Empresa");
        }
    })
        .done(function(data) {
            console.log(data);
            if (data.success === true) {
                alertify.success(data.message);
            } else {
                alertify.error(data.message);
            }

            $.unblockUI();
        })
        .fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });
});

    
    

});
