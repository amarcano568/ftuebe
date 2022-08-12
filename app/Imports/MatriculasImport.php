<?php

namespace App\Imports;

use App\Matriculas_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class MatriculasImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Matriculas_tmp([                                      
            'numIdMatricula'                    => $row[\strtolower('numIdMatricula')],
            'numIdSerie'                        => $row[\strtolower('numIdSerie')],
            'numIdAlumno'                       => $row[\strtolower('numIdAlumno')],
            'strAlumnoMatricula'                => $row[\strtolower('strAlumnoMatricula')],
            'numIdCliente'                      => $row[\strtolower('numIdCliente')],
            'strClienteMatricula'               => $row[\strtolower('strClienteMatricula')],
            'numTipoRecibo'                     => $row[\strtolower('numTipoRecibo')],
            'fecFechaMatricula'                 => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecFechaMatricula')]),
            'blnEmagister'                      => $row[\strtolower('blnEmagister')],
            'fecFechaFin'                       => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecFechaFin')]),
            'numTipoTarifaEstudios'             => $row[\strtolower('numTipoTarifaEstudios')],
            'numIdPersonal'                     => $row[\strtolower('numIdPersonal')],
            'numIdCursoAcademico'               => $row[\strtolower('numIdCursoAcademico')],
            'strCodigoExpediente'               => $row[\strtolower('strCodigoExpediente')],
            'numIdTipoMatricula'                => $row[\strtolower('numIdTipoMatricula')],
            'numIdPlanVencimiento'              => $row[\strtolower('numIdPlanVencimiento')],
            'fecPrimerVencimiento'              => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[\strtolower('fecPrimerVencimiento')]),
            'numImporteTotalGlobal'             => $row[\strtolower('numImporteTotalGlobal')],
            'strNomenclaturaRecibo'             => $row[\strtolower('strNomenclaturaRecibo')],
            'blnTarjeta'                        => $row[\strtolower('blnTarjeta')],
            'blnFinalizada'                     => $row[\strtolower('blnFinalizada')],
            'blnAnulada'                        => $row[\strtolower('blnAnulada')],
            'numCobrado'                        => $row[\strtolower('numCobrado')],
            'blnLiquidada'                      => $row[\strtolower('blnLiquidada')],
            'numImporteMatricula'               => $row[\strtolower('numImporteMatricula')],
            'bolPagadoMatricula'                => $row[\strtolower('bolPagadoMatricula')],
            'bolDomiciliacionBancaria'          => $row[\strtolower('bolDomiciliacionBancaria')],
            'numImporteDescuento'               => $row[\strtolower('numImporteDescuento')],
            'numPorcentajeDescuento'            => $row[\strtolower('numPorcentajeDescuento')],
            'numPendiente'                      => $row[\strtolower('numPendiente')],
            'numImporteGruposGlobal'            => $row[\strtolower('numImporteGruposGlobal')],
            'strConceptoDescuentoGlobal'        => $row[\strtolower('strConceptoDescuentoGlobal')],
            'blnDescuentoGlobalConPorcentaje'   => $row[\strtolower('blnDescuentoGlobalConPorcentaje')],
            'numPorcentajeDescuentoGlobal'      => $row[\strtolower('numPorcentajeDescuentoGlobal')],
            'numImporteDescuentoGlobal'         => $row[\strtolower('numImporteDescuentoGlobal')],
            'numIdDescuentoGlobal'              => $row[\strtolower('numIdDescuentoGlobal')],
            'strConceptoRecargoGlobal'          => $row[\strtolower('strConceptoRecargoGlobal')],
            'blnRecargoGlobalConPorcentaje'     => $row[\strtolower('blnRecargoGlobalConPorcentaje')],
            'numPorcentajeRecargoGlobal'        => $row[\strtolower('numPorcentajeRecargoGlobal')],
            'numImporteRecargoGlobal'           => $row[\strtolower('numImporteRecargoGlobal')],
            'numIdRecargoGlobal'                => $row[\strtolower('numIdRecargoGlobal')],
            'numPeriodicidadLiquidacion'        => $row[\strtolower('numPeriodicidadLiquidacion')],
            'blnPresencial'                     => $row[\strtolower('blnPresencial')],
            'blnSeguroEscolar'                  => $row[\strtolower('blnSeguroEscolar')],
            'numTotalAdeudos'                   => $row[\strtolower('numTotalAdeudos')],
            'blnExcluirFicheroAsnef'            => $row[\strtolower('blnExcluirFicheroAsnef')],
            'numImporteIVAGlobal'               => $row[\strtolower('numImporteIVAGlobal')],
            'numImporteRetencionGlobal'         => $row[\strtolower('numImporteRetencionGlobal')],
            'blnVariosAdeudos'                  => $row[\strtolower('blnVariosAdeudos')],
            'numImporteBaseGlobal'              => $row[\strtolower('numImporteBaseGlobal')],
            'numIdUsuario'                      => $row[\strtolower('numIdUsuario')],
            'strMaquina'                        => $row[\strtolower('strMaquina')],
            'blnEnviadoMail'                    => $row[\strtolower('blnEnviadoMail')],
            'numImporteBaseMatricula'           => $row[\strtolower('numImporteBaseMatricula')],
            'blnFundae'                         => $row[\strtolower('blnFundae')],
            'numIdMatriculaFundae'              => $row[\strtolower('numIdMatriculaFundae')],
            'numOrdenInscripcion'               => $row[\strtolower('numOrdenInscripcion')],
            'blnExcluirAlumnoFicheroAsnef'      => $row[\strtolower('blnExcluirAlumnoFicheroAsnef')],
            'blnCobrosOnline'                   => $row[\strtolower('blnCobrosOnline')],
            'blnSuperadoFundae'                 => $row[\strtolower('blnSuperadoFundae')],
            'strComentarios'                    => $row[\strtolower('strComentarios')],           
       ]);
    }

    public function rules(): array
        {
            return [

                // Siempre valida por lotes
                // Fila.columna
                '0.0' => 'in:numIdMatricula',
                '0.1' => 'in:numIdSerie',
                '0.2' => 'in:numIdAlumno',
            ];
        }
}
