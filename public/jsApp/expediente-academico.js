$(document).on("ready", function() {


    $(document).on("change", "#language", function(event) {
        event.preventDefault();
        tipo_estudio = $("#estudio").val();
        idAlumno = $("#idAlumno").val();
        window.location = $(this).val();
        // switch (tipo_estudio) {
        //     case 'grado_oficial': //'grado_oficial'
        //         window.location = $(this).val();
        //         break;
        //     case 'titulo_propio': //'titulo_propio'
        //         window.location = $(this).val();
        //         break;
          
        // }
    });
       
    $(document).on("click", "#btn-print-expediente", function(event) {
        event.preventDefault();
        // pdf = $("#file-pdf").val();
        // $("#ObjPdf").attr("src", pdf);
        $("#modal-expediente-academico").modal('show');
    });

});