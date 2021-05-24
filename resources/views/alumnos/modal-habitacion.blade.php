<form id="form-hospedaje" method="post" enctype="multipart/form-data" action="actualizar-hospedaje" data-parsley-validate="">
    @csrf 
    <div id="modal-asignar-habitacion" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="title-modal-habitacion"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="text" id="id_habitacion_alumno" name="id_habitacion_alumno" style="display: none;">
                        <input type="text" id="uuid_habitacion" name="uuid_habitacion" style="display: none;">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="numero_habitacion">Habitación</label>
                                <select data-placeholder="Seleccione una habitación" name="numero_habitacion"
                                    id="numero_habitacion" class="form-control chosen-select" required>
                                    <option value=""></option>
                                    @foreach($habitaciones as $habitacion)
                                        <option value="{{ $habitacion->num_habitacion }}">{{ $habitacion->num_habitacion }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="tipo_hab">Fecha de entrada</label>
                                <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipo_hab">Fecha de salida</label>
                                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">                                
                                <label for="tipo_hab">Fianza</label>
                                <br>
                                <label class="radio-inline"> <input type="radio" name="entrego_fianza" id="fianza_si" value="S" checked> Si </label>
                                <label class="radio-inline"> <input type="radio" name="entrego_fianza" id="fianza_no" value="N"> No </label>
                            </div>
                            <div class="col-sm-4">
                                <label for="tipo_hab">Monto</label>
                                <input type="number" class="form-control" id="monto_fianza" name="monto_fianza" >
                            </div>
                            <div class="col-sm-5">
                                <label for="tipo_hab">Fecha de entrega</label>
                                <input type="date" class="form-control" id="fecha_entrega_fianza" name="fecha_entrega_fianza" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="observaciones_entrega_hab">Observaciones</label>
                                <textarea name="observaciones_entrega_hab" id="observaciones_entrega_hab" rows="2"
                                    class="form-control"></textarea>
                            </div>
                        </div>                   
                    <hr>                    
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-info" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>