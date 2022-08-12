<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    protected $table = 'grupos'; 
    protected $primaryKey = 'numIdGrupo';

    protected $fillable = [
        'numIdGrupo',
        'strCodigoExpediente',
        'strNombreGrupo',
        'bolDefinitivo',
        'bolFinalizado',
        'fecFechaInicio',
        'fecFechaFinalizacion',
        'id_curso',
        'id_convocatoria',
        'bolIndefinido',
        'numMinimoAlumnos',
        'numMaximoAlumnos', 
        'blnSimplificado',
        'blnRentable',
        'numAccionformativa',
        'numAlumnos',
        'numDiferencia',
        'numGrupoForcem',
        'numPorcentaje',
        'strModalidadForcem',
        'strTituloModulo',
        'numIdTipoGrupo',
        'blnEmagister',
        'numIdCursoAcademico',
        'numColor',
        'numIdIva',
        'numIdIdiomaMerit',
        'blnServicio',
        'numIdNivelMerit',
        'numIdProfesorEncargado',
        'numModeloBoletin',
        'numTotalHoras',
        'numIdPersonal',
        'numIdTipoGrupo2',
        'blnDistanciaJornadaLaboral',
        'strRepresentanteLegal',
        'strNifRepresentanteLegal',
        'numTipoNifRepresentanteLegal',
        'strEstado',
        'numPrecioGrupo',
        'numPrecioPeriodicoGrupo',
        'numPrecioHoraGrupo',
        'numIdRetencion',
        'strCuentaBeneficios',
        'strNombreCuentaBeneficios',
        'numCursoMoodle',
        'numGrupoMoodle',
        'blnGrupoMoodleEliminado',
        'strNombreCortoCursoMoodle',
        'blnPublicarEnMoodle',
        'strNombreGrupoMoodle',
        'numIdCategoriaMoodle',
        'strUrl',
        'memComentarios' 
    ];
}
