<?php

namespace App\Imports;

use App\Matriculas_grupos_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class MatriculasGruposImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Matriculas_grupos_tmp([                                   
            'numIdMatriculaGrupo'                       => $row[\strtolower('numIdMatriculaGrupo')],
            'blnFinalizada'                             => $row[\strtolower('blnFinalizada')],
            'bolDefinitiva'                             => $row[\strtolower('bolDefinitiva')],
            'fecFechaInicio'                            => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecFechaInicio')]),
            'fecBajaDefinitiva'                         => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecBajaDefinitiva')]),
            'fecUltimaLiquidacion'                      => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecUltimaLiquidacion')]),
            'fecProximaLiquidacion'                     => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecProximaLiquidacion')]),
            'fecFinBajaTemporal'                        => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecFinBajaTemporal')]),
            'strCausaBaja'                              => $row[\strtolower('strCausaBaja')],
            'fecInicioBajaTemporal'                     =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecInicioBajaTemporal')]),
            'numImporteBaseMatriculaGrupo'              => $row[\strtolower('numImporteBaseMatriculaGrupo')],
            'bolBajaDefinitiva'                         => $row[\strtolower('bolBajaDefinitiva')],
            'bolBajaTemporal'                           => $row[\strtolower('bolBajaTemporal')],
            'numIdCausaBaja'                            => $row[\strtolower('numIdCausaBaja')],
            'numIdGrupo'                                => $row[\strtolower('numIdGrupo')],
            'numIdMatricula'                            => $row[\strtolower('numIdMatricula')],
            'numPeriodicidadImporte'                    => $row[\strtolower('numPeriodicidadImporte')], 
            'numPeriodicidadLiquidacion'                => $row[\strtolower('numPeriodicidadLiquidacion')],
            'blnFinalizacionAPriori'                    => $row[\strtolower('blnFinalizacionAPriori')],
            'blnSinDerechoCalificacion'                 => $row[\strtolower('blnSinDerechoCalificacion')],
            'numIdRecargoPredefinido'                   => $row[\strtolower('numIdRecargoPredefinido')],
            'fecFinalizacionPrevista'                   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecFinalizacionPrevista')]),
            'numLicencias'                              => $row[\strtolower('numLicencias')],
            'numHorasContratadas'                       => $row[\strtolower('numHorasContratadas')],
            'numHorasConsumidas'                        => $row[\strtolower('numHorasConsumidas')],
            'numImporteTotalMatriculaGrupo'             => $row[\strtolower('numImporteTotalMatriculaGrupo')],
            'numIdDescuentoGrupo'                       => $row[\strtolower('numIdDescuentoGrupo')],
            'numImporteDescuentoMatriculaGrupo'         => $row[\strtolower('numImporteDescuentoMatriculaGrupo')],
            'numPorcentajeDescuentoMatriculaGrupo'      => $row[\strtolower('numPorcentajeDescuentoMatriculaGrupo')],
            'blnDescuentoGrupoConPorcentaje'            => $row[\strtolower('blnDescuentoGrupoConPorcentaje')],
            'strConceptoRecargoGrupo'                   => $row[\strtolower('strConceptoRecargoGrupo')],
            'strConceptoDescuentoGrupo'                 => $row[\strtolower('strConceptoDescuentoGrupo')],
            'numImporteBaseImponibleMatriculaGrupo'     => $row[\strtolower('numImporteBaseImponibleMatriculaGrupo')],
            'numImporteIVAMatriculaGrupo'               => $row[\strtolower('numImporteIVAMatriculaGrupo')],
            'numImporteRetencionMatriculaGrupo'         => $row[\strtolower('numImporteRetencionMatriculaGrupo')],
            'numPorcentajeIVAMatriculaGrupo'            => $row[\strtolower('numPorcentajeIVAMatriculaGrupo')],
            'numPorcentajeRetencionMatriculaGrupo'      => $row[\strtolower('numPorcentajeRetencionMatriculaGrupo')],
            'numIdCuentaIVA'                            => $row[\strtolower('numIdCuentaIVA')],
            'numIdCuentaRetencion'                      => $row[\strtolower('numIdCuentaRetencion')],
            'strCuentaIva'                              => $row[\strtolower('strCuentaIva')],
            'strCuentaRetencion'                        => $row[\strtolower('strCuentaRetencion')],
            'numImporteRecargoMatriculaGrupo'           => $row[\strtolower('numImporteRecargoMatriculaGrupo')],
            'numPorcentajeRecargoMatriculaGrupo'        => $row[\strtolower('numPorcentajeRecargoMatriculaGrupo')],
            'blnRecargoGrupoConPorcentaje'              => $row[\strtolower('blnRecargoGrupoConPorcentaje')],
            'strCuentaBeneficios'                       => $row[\strtolower('strCuentaBeneficios')],
            'strNombreCuentaBeneficios'                 => $row[\strtolower('strNombreCuentaBeneficios')],
            'blnEnrolMoodle'                            => $row[\strtolower('blnEnrolMoodle')],
            'blnSuspendida'                             => $row[\strtolower('blnSuspendida')],
            'numIdGrupoFundae'                          => $row[\strtolower('numIdGrupoFundae')],
            'blnEntregadoDiplomaFundae'                 => $row[\strtolower('blnEntregadoDiplomaFundae')],
            'blnJornadaLaboralFundae'                   => $row[\strtolower('blnJornadaLaboralFundae')],             
        ]);
    }

    public function rules(): array
        {
            return [

                // Siempre valida por lotes
                // Fila.columna
                '0.0' => 'in:numIdMatriculaGrupo',
                '0.1' => 'in:blnFinalizada',
                '0.2' => 'in:bolDefinitiva',
            ];
        }
}
