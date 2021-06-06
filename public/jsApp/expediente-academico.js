$(document).on("ready", function() {


    $(document).on("change", "#language", function(event) {
        event.preventDefault();
        tipo_estudio = $("#estudio").val();
        idAlumno = $("#idAlumno").val();
        switch (tipo_estudio) {
            case 'grado_oficial': //'grado_oficial'
                window.location = $(this).val();
                break;
            case 'titulo_propio': //'titulo_propio'
                window.location = $(this).val();
                break;
          
        }
    });

});