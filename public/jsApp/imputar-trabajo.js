$(document).on("ready", function() {
    var dt_table_trabajos_imputados = "";

    $(document).on("change", "#id_alumno", function (event) {
        $("#id_alumno_trabajo").val($(this).val());
      listarTrabajosRealizados($(this).val());
    });

    $(".chosen-select").chosen(ConfigChosen());

    $("#migas-pan").html(
        '<ol class="breadcrumb border-0 m-0">' +
            '<li class="breadcrumb-item">Home</li>' +
            '<li class="breadcrumb-item">' +
            '<a href="#">Imputar trabajo</a></li>' +
            '<li class="breadcrumb-item active">Imputar</li>' +
            "</ol>"
    );

    function listarTrabajosRealizados(idAlumno) {
        destroy_existing_data_table("#table-trabajos-realizados");
        var groupColumn = 2;
        $.fn.dataTable.ext.pager.numbers_length = 4;
        dt_table_trabajos_imputados = $("#table-trabajos-realizados").DataTable({
            order: [[1, "asc"]],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            processing: true,
            serverSide: true,
            responsive: true,
            paginationType: "input",
            sPaginationType: "full_numbers",
            language: {
                buttons: {
                    copyTitle: "Copiado al portapapeles.",
                    copySuccess: {
                        _: "Copiados %d Trabajos realizados.",
                        1: "Copiado 1 Trabajo realizado."
                    }
                },
                searchPlaceholder: "Buscar",
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ Trabajos realizados",
                sZeroRecords:
                    "No se encontró ningun Trabajo realizado con la Condición del Filtro",
                sEmptyTable: "Ningun Trabajo realizado Agregado aún...",
                sInfo: "Del _START_ al _END_ de un total de _TOTAL_ Trabajos realizados",
                sInfoEmpty: "De 0 al 0 de un total de 0 Trabajo realizado",
                sInfoFiltered: "(filtrado de un total de _MAX_ Trabajos realizados)",
                sInfoPostFix: "",
                sSearch: "",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: loadingUI(
                    "Cargando listado de Trabajos realizados...",
                    "white"
                ),
                oPaginate: {
                    sFirst: '<i class="fas fa-angle-double-left"></i>',
                    sLast: '<i class="fas fa-angle-double-right"></i>',
                    sNext: '<i class="fas fa-angle-right"></i>',
                    sPrevious: '<i class="fas fa-angle-left"></i>'
                },
                oAria: {
                    sSortAscending:
                        ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending:
                        ": Activar para ordenar la columna de manera descendente"
                }
            },
            lengthMenu: [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"]
            ],
            iDisplayLength: 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
     
                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="4"><strong>'+group+'<strong></td></tr>'
                        );
     
                        last = group;
                    }
                } );
            },
            ajax: {
                method: "post",
                url: "listar-trabajos-realizados",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    idAlumno: idAlumno
                }
            },
            initComplete: function(settings, json) {
                $.unblockUI();
                $('[data-toggle="popover"]').popover();
                dt_table_trabajos_imputados.columns(2).visible(false);
            },
            columns: [                
                {
                    data: "trabajo",                  
                },
                {
                    data: "fecha",
                    render: function(data) {
                        return moment(data).format("DD-MM-YYYY");
                    }
                },
                {
                    data: "mes_ano"
                },
                {
                    data: "observaciones"
                },
                {
                    data: "action"
                }
            ],
            columnDefs: [
                {
                    width: "25%",
                    targets: 0
                },
                {
                    width: "17.5%",
                    targets: 1,
                    orderable: false
                },
                {
                    width: "45%",
                    targets: 3
                },
                {
                    width: "12.5%",
                    targets: 4
                }
            ]
        });

    }

    $("body").on("click", "#body-trabajos-realizados a", function(e) {
        e.preventDefault();

        accion_ok = $(this).attr("data-accion");
        idTrabajo = $(this).data("id-trabajo-imputado");

        switch (accion_ok) {
            case 'eliminar-trabajo': //eliminar-trabajo
            $.ajax({
                url: "eliminar-trabajo",
                type: "post",
                datatype: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    idTrabajo: idTrabajo
                },
                beforeSend: function() {
                    loadingUI("Eliminando trabajo imputado.");
                }
            })
                .fail(function(statusCode, errorThrown) {
                    console.log(statusCode + " " + errorThrown);
                })
                .done(function(response) {
                    console.log(response.data);
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

                    $.unblockUI();
                });
                break;           
        }
    });

    // $("#form-imputar-trabajo")
    //     .parsley()
    //     .on("field:validated", function() {
    //         var ok = $(".parsley-error").length === 0;
    //         $(".bs-callout-info").toggleClass("hidden", !ok);
    //         $(".bs-callout-warning").toggleClass("hidden", ok);
    //     })
    //     .on("form:submit", function() {
    //         return true;
    //     });

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
