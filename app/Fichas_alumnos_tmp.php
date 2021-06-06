<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichas_alumnos_tmp extends Model
{
    protected $table = 'fichas_alumnos_tmp'; 
    protected $primaryKey = 'numIdFichaAlumno';

    protected $fillable = [
        'numIdFichaAlumno',
        'strResumenInforme',
        'fecFecha',
        'memComentarios',
        'numNota',
        'numIdCursoAcademico',
        'numIdConvocatoria',
        'blnDefinitivo',
        'numIdAlumno',
        'numIdCalificacion',
        'numIdClase',
        'numIdGrupo',
        'blnVisibleConnect',
        'blnNoMostrarNumericoConnect',
        'numIdAsignatura',
        'blnBoletinPublicadoConnect',
        'numIdCliente',
        'numEstadoComunicacion',
        'numIdPersonal',
        'fecCambioEstadoComunicacion',
        'strEstadoComunicacion',
        'blnFirmada',
        'fecFirma',        
    ];
}
