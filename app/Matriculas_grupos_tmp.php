<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculas_grupos_tmp extends Model
{
    protected $table = 'matricula_grupos_tmp'; 
    protected $primaryKey = 'numIdMatriculaGrupo';

    protected $fillable = [
        'numIdMatriculaGrupo',
        'blnFinalizada',
        'bolDefinitiva',
        'fecFechaInicio',
        'fecBajaDefinitiva',
        'fecUltimaLiquidacion',
        'fecProximaLiquidacion',
        'fecFinBajaTemporal',
        'strCausaBaja',
        'fecInicioBajaTemporal',
        'numImporteBaseMatriculaGrupo',
        'bolBajaDefinitiva',
        'bolBajaTemporal',
        'numIdCausaBaja',
        'numIdGrupo',
        'numIdMatricula',
        'numPeriodicidadImporte',
        'numPeriodicidadLiquidacion',
        'blnFinalizacionAPriori',
        'blnSinDerechoCalificacion',
        'numIdRecargoPredefinido',
        'fecFinalizacionPrevista',
        'numLicencias',
        'numHorasContratadas',
        'numHorasConsumidas',
        'numImporteTotalMatriculaGrupo',
        'numIdDescuentoGrupo',
        'numImporteDescuentoMatriculaGrupo',
        'numPorcentajeDescuentoMatriculaGrupo',
        'blnDescuentoGrupoConPorcentaje',
        'strConceptoRecargoGrupo',
        'strConceptoDescuentoGrupo',
        'numImporteBaseImponibleMatriculaGrupo',
        'numImporteIVAMatriculaGrupo',
        'numImporteRetencionMatriculaGrupo',
        'numPorcentajeIVAMatriculaGrupo',
        'numPorcentajeRetencionMatriculaGrupo',
        'numIdCuentaIVA',
        'numIdCuentaRetencion',
        'strCuentaIva',
        'strCuentaRetencion',
        'numImporteRecargoMatriculaGrupo',
        'numPorcentajeRecargoMatriculaGrupo',
        'blnRecargoGrupoConPorcentaje',
        'strCuentaBeneficios',
        'strNombreCuentaBeneficios',
        'blnEnrolMoodle',
        'blnSuspendida',
        'numIdGrupoFundae',
        'blnEntregadoDiplomaFundae',
        'blnJornadaLaboralFundae',
        ];
}
