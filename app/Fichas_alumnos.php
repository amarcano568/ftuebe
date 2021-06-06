<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichas_alumnos extends Model
{
    protected $table = 'fichas_alumnos'; 
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
