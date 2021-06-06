getActualizacion()
function getActualizacion(){
    $.ajax({
        url: "get-actualizacion",
        type: "post",
        datatype: "json",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        beforeSend: function() {
            loadingUI("Obteniendo datos del Habitación.");
        }
    })
        .fail(function(statusCode, errorThrown) {
            console.log(statusCode + " " + errorThrown);
        })
        .done(function(response) {
            console.log(response.data);
            $("#actualizacion-alumnos").html('<i class="far fa-calendar-alt"></i> '+response.data);
            $("#actualizacion-fichas").html('<i class="far fa-calendar-alt"></i> '+response.dataAux);
            $.unblockUI();
        });
}


$(document).on("click", "#btn-importar-nuevos-alumnos", function(event) {
    event.preventDefault();
    $("#modal-importar-alumnos").modal("show");
});

$("#modal-importar-alumnos").on("shown.bs.modal", function() {
    iconoDropZone =
        '<br><br><i class="text-success fa-4x far fa-file-excel"></i><br><h6>Click para importar nuevos alumnos.</h6>';
    configuraDropZone(iconoDropZone);
});

function configuraDropZone(iconoDropZone) {
    idMiembro = $("#idMiembro").val();
    Dropzone.autoDiscover = false;
    Dropzone.prototype.defaultOptions.dictRemoveFile = "Borrar archivo..";
    // if (Dropzone.instances.length > 0)
    //     Dropzone.instances.forEach(bz => bz.destroy());
    $("#formDropZone").html("");
    $("#formDropZone").append(
        "<form action='subir-fichero-nuevos-alumnos' method='POST' files='true' enctype='multipart/form-data' id='dZUpload' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
            "<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>" +
            iconoDropZone +
            "</div></form>"
    );

    myAwesomeDropzone = myAwesomeDropzone = {
        maxFilesize: 12,
        acceptedFiles: ".xlsx, .xls",
        addRemoveLinks: true,
        timeout: 50000,
        maxFiles: 1,
        removedfile: function(file) {
            var name = file.name;
            // console.log(name);
            $.ajax({
                type: "post",
                url: "delete-fichero-importar-alumno",
                data: {
                    filename: name
                },
                success: function(response) {
                    console.log("File has been successfully removed!!");
                    var dt = new Date();
                    if (response.success){
                        alertify.success(response.message);
                    }else{
                        alertify.error(response.message);
                    }
                   
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null
                ? fileRef.parentNode.removeChild(file.previewElement)
                : void 0;
        },
        params: {},
        success: function(file, response) {
            console.log(response);
            //$("#ModalAgregarLogo").modal("hide");
            //$("#ModalAgregarLogo .close").click();
            var dt = new Date();
            $("#modal-importar-alumnos").modal("hide");
            alertify.success('<i class="far fa-thumbs-up"></i> El fichero fue importado correctamente.');
        },
        error: function(file, response) {
            return false;
        }
    };

    var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone);

    // myDropzone.on("queuecomplete", function(file, response) {
    //     if (Dropzone.instances.length > 0)
    //         Dropzone.instances.forEach(bz => bz.destroy());
    //     $("#ModalAgregarLogo").modal("hide");
    // });
}

$(document).on("click", "#btn-importar-fichas-alumnos", function(event) {
    event.preventDefault();
    $("#modal-importar-fichas-alumnos").modal("show");
});

$("#modal-importar-fichas-alumnos").on("shown.bs.modal", function() {
    iconoDropZone =
        '<br><br><i class="text-success fa-4x far fa-file-excel"></i><br><h6>Click para importar los datos de la ficha de los alumnos.</h6>';
    configuraDropZoneFichasAlumnos(iconoDropZone);
});

function configuraDropZoneFichasAlumnos(iconoDropZone) {
    idMiembro = $("#idMiembro").val();
    Dropzone.autoDiscover = false;
    Dropzone.prototype.defaultOptions.dictRemoveFile = "Borrar archivo..";
    // if (Dropzone.instances.length > 0)
    //     Dropzone.instances.forEach(bz => bz.destroy());
    $("#formDropZoneFichaAlumno").html("");
    $("#formDropZoneFichaAlumno").append(
        "<form action='subir-fichero-fichas-alumnos' method='POST' files='true' enctype='multipart/form-data' id='dZUploadFicha' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
            "<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>" +
            iconoDropZone +
            "</div></form>"
    );

    myAwesomeDropzone = myAwesomeDropzone = {
        maxFilesize: 12,
        acceptedFiles: ".xlsx, .xls",
        addRemoveLinks: true,
        timeout: 50000,
        maxFiles: 1,
        removedfile: function(file) {
            var name = file.name;
            // console.log(name);
            $.ajax({
                type: "post",
                url: "delete-fichero-importar-alumno",
                data: {
                    filename: name
                },
                success: function(response) {
                    console.log("File has been successfully removed!!");
                    var dt = new Date();
                    if (response.success){
                        alertify.success(response.message);
                    }else{
                        alertify.error(response.message);
                    }
                   
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null
                ? fileRef.parentNode.removeChild(file.previewElement)
                : void 0;
        },
        params: {},
        success: function(file, response) {
            console.log(response);
            //$("#ModalAgregarLogo").modal("hide");
            //$("#ModalAgregarLogo .close").click();
            var dt = new Date();
            $("#modal-importar-fichas-alumnos").modal("hide");
            alertify.success('<i class="far fa-thumbs-up"></i> El fichero con las fichas de los alumnos fue importado correctamente.');
        },
        error: function(file, response) {
            return false;
        }
    };

    var myDropzone = new Dropzone("#dZUploadFicha", myAwesomeDropzone);

    // myDropzone.on("queuecomplete", function(file, response) {
    //     if (Dropzone.instances.length > 0)
    //         Dropzone.instances.forEach(bz => bz.destroy());
    //     $("#ModalAgregarLogo").modal("hide");
    // });
}


