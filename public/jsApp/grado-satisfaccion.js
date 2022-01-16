$(document).on("ready", function() {
    var server = "";
    var pathname = document.location.pathname;
    var pathnameArray = pathname.split("/public/");
   

    server = pathnameArray.length > 0 ? pathnameArray[0] + "/public/" : "";
    $(".chosen-select").chosen(ConfigChosen());

    $("#migas-pan").html(
        '<ol class="breadcrumb border-0 m-0">' +
            '<li class="breadcrumb-item">Home</li>' +
            '<li class="breadcrumb-item">Indicadores-Tasas SIGC</li>' +
            '<li class="breadcrumb-item active">Grado de satisfacción</li>' +
            "</ol>"
    );    

    $(document).on("click", "#btn-cargar-fichero", function(event) {
        event.preventDefault();

        valida1 = $("#grupo")
        .parsley()
        .validate();
        valida2 = $("#periodo")
        .parsley()
        .validate();
        valida3 = $("#tipo_estudio")
        .parsley()
        .validate();

        if (valida1 !== true || valida2 !== true || valida3 !== true) {
            return false;
        }
       
        iconoDropZone = '<br><br><i class="text-success fa-4x far fa-file-excel"></i><br><h6>Click para cargar fichero csv.</h6>';
        configuraDropZone(iconoDropZone);

    });

    function configuraDropZone(iconoDropZone) {
        grupo= $("#grupo").val();
        periodo = $("#periodo").val();
        tipo_estudio = $("#tipo_estudio").val();
        profesores = $("#profesores").val();
        asignaturas = $("#asignaturas").val();
        personal = $("#personal").val();
        Dropzone.autoDiscover = false;
        Dropzone.prototype.defaultOptions.dictRemoveFile = "Borrar archivo..";
        $("#formDropZone").html("");
        $("#formDropZone").append(
            "<form action='subir-fichero-grado-satisfaccion' method='POST' files='true' enctype='multipart/form-data' id='dZUpload' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
                "<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>" +
                iconoDropZone +
                "</div></form>"
        );
    
        myAwesomeDropzone = myAwesomeDropzone = {
            maxFilesize: 12,
            acceptedFiles: ".csv",
            timeout: 50000,
            maxFiles: 1,
            maxFilesize: 4, // MB
            dictRemoveFile: "Borrar",
            autoProcessQueue: true,
            params: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                grupo: grupo,
                periodo: periodo,
                tipo_estudio: tipo_estudio,
                profesores: profesores,
                asignaturas: asignaturas,
                personal: personal
            },                                       
            success: function(file, response) {
                console.log(response);
                alertify.success(response);

                var link = document.createElement("a");
                link.href = response;
                link.download = 'Grado de satisfacción ('+grupo+')';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                //deleteFile(response);
            },
            error: function(file, response) {
                return false;
            }
        };
    
        var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone);
    
        myDropzone.on("queuecomplete", function(file, response) {
            if (Dropzone.instances.length > 0)
                Dropzone.instances.forEach(bz => bz.destroy());           
        });
    }

    $(document).on("change", "#grupo", function (event) {
        $(".tipos-grupos").hide();
        tipo = $(this).val();
        if (tipo == "profesorado"){
            $("#div-profesorado").show();
        }else if(tipo == 'pas'){
            $("#div-personal").show();
        }
    });
    
});
