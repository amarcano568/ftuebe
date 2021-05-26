{{-- Certificados de condicion de alumno --}}
<div class="row datos_adicionales" id="cert-condicion-alumno" style="display: none;">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Curso</label>
                        <select name="periodo_certificacion_condicion" id="periodo_certificacion_condicion" class="form-control chosen-select">
                            <option value="2019-2020">2019-2020</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                            <option value="2026-2027">2026-2027</option>
                            <option value="2027-2028">2027-2028</option>
                            <option value="2028-2029">2028-2029</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Año</label>
                        <select name="ano_certificacion_condicion" id="ano_certificacion_condicion" class="form-control chosen-select">
                            <option value="1º año">1º año</option>
                            <option value="2º año">2º año</option>
                            <option value="3º año">3º año</option>
                            <option value="4º año">4º año</option>        
                        </select>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Certificados de empadronamiento --}}
<div class="row datos_adicionales" id="cert-de-empadronamiento" style="display: none;">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Tipo de certificado</label>
                        <select name="tipo_de_empadronamiento" id="tipo_de_empadronamiento" class="form-control chosen-select">
                            <option value="Individual">Individual</option>
                            <option value="Familiar">Familiar</option>                          
                        </select>
                    </div>                    
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Informe de mobiliario por habitación --}}
<div class="row datos_adicionales" id="inf-mobiliario-habitacion" style="display: none;">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Habitaciones</label>
                        <select data-placeholder="Seleccione una habitación" name="numero_habitacion" id="numero_habitacion" class="form-control chosen-select">
                            <option value=""></option>
                            @foreach ($habitaciones as $habitacion)
                                <option value="{{ $habitacion->id }}">{{ $habitacion->num_habitacion }}</option>
                            @endforeach
                        </select>
                    </div>                    
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Informe Ocupación de habitación entre fechas --}}
<div class="row datos_adicionales" id="inf-ocupacion-hab-entre-fecha" style="display: none;">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Habitaciones</label>
                        <select data-placeholder="Seleccione una habitación" name="num_hab_ocup_fechas" id="num_hab_ocup_fechas" class="form-control chosen-select">
                            <option value=""></option>
                            @foreach ($habitaciones as $habitacion)
                                <option value="{{ $habitacion->num_habitacion }}">{{ $habitacion->num_habitacion }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="col-sm-3">
                        <label for="">Desde</label>
                        <input type="date" class="form-control" id="fec_desde_ocup_hah" name="fec_desde_ocup_hah">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Hasta</label>
                        <input type="date" class="form-control" id="fec_hasta_ocup_hah" name="fec_hasta_ocup_hah">
                    </div>                   
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Informe de habitaciones desocupadas entre fechas --}}
<div class="row datos_adicionales" id="inf-hab-desocupadas-entre-fechas" style="display: none;">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-sm-3">
                        <label for="">Habitaciones</label>
                        <select data-placeholder="Seleccione una habitación" name="num_hab_desocupadas_fechas" id="num_hab_desocupadas_fechas" class="form-control chosen-select">
                            <option value=""></option>
                            @foreach ($habitaciones as $habitacion)
                                <option value="{{ $habitacion->num_habitacion }}">{{ $habitacion->num_habitacion }}</option>
                            @endforeach
                        </select>
                    </div>  --}}
                    <div class="col-sm-3">
                        <label for="">Desde</label>
                        <input type="date" class="form-control" id="fec_desde_desocupadas_hah" name="fec_desde_desocupadas_hah">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Hasta</label>
                        <input type="date" class="form-control" id="fec_hasta_desocupadas_hah" name="fec_hasta_desocupadas_hah">
                    </div>                   
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Informe de habitaciones ocupadas entre fechas --}}
<div class="row datos_adicionales" id="inf-hab-ocupadas-entre-fechas" style="display: none;">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-sm-3">
                        <label for="">Habitaciones</label>
                        <select data-placeholder="Seleccione una habitación" name="num_hab_desocupadas_fechas" id="num_hab_desocupadas_fechas" class="form-control chosen-select">
                            <option value=""></option>
                            @foreach ($habitaciones as $habitacion)
                                <option value="{{ $habitacion->num_habitacion }}">{{ $habitacion->num_habitacion }}</option>
                            @endforeach
                        </select>
                    </div>  --}}
                    <div class="col-sm-3">
                        <label for="">Desde</label>
                        <input type="date" class="form-control" id="fec_desde_ocupadas_hah" name="fec_desde_ocupadas_hah">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Hasta</label>
                        <input type="date" class="form-control" id="fec_hasta_ocupadas_hah" name="fec_hasta_ocupadas_hah">
                    </div>                   
                </div>
            </div>
          </div>
    </div>
</div>
{{-- Notificación de asignación de alojamiento --}}
<div class="row datos_adicionales" id="not-asignacion-alojamiento" style="display: none;">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for=""># habitación</label>
                        <input type="text" class="form-control" id="notifica_numero_hab" name="notifica_numero_hab" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Hasta</label>
                        <input type="date" class="form-control" id="notifica_desde_hab" name="notifica_desde_hab" readonly>
                    </div>                   
                    <div class="col-sm-3">
                        <label for="">Hasta</label>
                        <input type="date" class="form-control" id="notifica_hasta_hab" name="notifica_hasta_hab" readonly>
                    </div> 
                </div>
            </div>
          </div>
    </div>
</div>