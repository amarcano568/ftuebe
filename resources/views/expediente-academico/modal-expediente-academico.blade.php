<div id="modal-expediente-academico" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Expediente académico.</h5>
          <button id="cerrarModal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body" >
          <div class="x_content" id="formDropZone">
            <iframe id="ObjPdf" src="/public/pdf/{{$pdf}}" width="100%" height="500" type="application/pdf"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
