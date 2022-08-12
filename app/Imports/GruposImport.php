<?php

namespace App\Imports;

use App\Grupos_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class GruposImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grupos_tmp([                       
            'numIdGrupo'                => $row[strtolower('numIdGrupo')],
            'strCodigoExpediente'       => $row[strtolower('strCodigoExpediente')],
            'strNombreGrupo'            => $row[strtolower('strNombreGrupo')],
            'bolDefinitivo'             => $row[strtolower('bolDefinitivo')],
            'bolFinalizado'             => $row[strtolower('bolFinalizado')],
            'fecFechaInicio'            => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('fecFechaInicio')]),
            'fecFechaFinalizacion'      => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('fecFechaFinalizacion')]),
            'id_curso'                  => $row[strtolower('id_curso')],
            'id_convocatoria'           => $row[strtolower('id_convocatoria')],
            'bolIndefinido'             => $row[strtolower('bolIndefinido')],
            'numMinimoAlumnos'          => $row[strtolower('numMinimoAlumnos')],
            'numMaximoAlumnos'          => $row[strtolower('numMaximoAlumnos')],
            'blnSimplificado'           => $row[strtolower('blnSimplificado')],
            'blnRentable'               => $row[strtolower('blnRentable')],
            'numAccionformativa'        => $row[strtolower('numAccionformativa')],
            'numAlumnos'                => $row[strtolower('numAlumnos')],
            'numDiferencia'             => $row[strtolower('numDiferencia')],
            'numGrupoForcem'            => $row[strtolower('numGrupoForcem')],
            'numPorcentaje'             => $row[strtolower('numPorcentaje')],
            'strModalidadForcem'        => $row[strtolower('strModalidadForcem')],
            'strTituloModulo'           => $row[strtolower('strTituloModulo')],
            'numIdTipoGrupo'            => $row[strtolower('numIdTipoGrupo')],
            'blnEmagister'              => $row[strtolower('blnEmagister')],
            'numIdCursoAcademico'       => $row[strtolower('numIdCursoAcademico')],
            'numColor'                  => $row[strtolower('numColor')],
            'numIdIva'                  => $row[strtolower('numIdIva')],
            'numIdIdiomaMerit'          => $row[strtolower('numIdIdiomaMerit')],
            'blnServicio'               => $row[strtolower('blnServicio')],
            'numIdNivelMerit'           => $row[strtolower('numIdNivelMerit')],
            'numIdProfesorEncargado'    => $row[strtolower('numIdProfesorEncargado')],
            'numModeloBoletin'          => $row[strtolower('numModeloBoletin')],
            'numTotalHoras'             => $row[strtolower('numTotalHoras')],
            'numIdPersonal'             => $row[strtolower('numIdPersonal')],
            'numIdTipoGrupo2'           => $row[strtolower('numIdTipoGrupo2')],
            'blnDistanciaJornadaLaboral'=> $row[strtolower('blnDistanciaJornadaLaboral')],
            'strRepresentanteLegal'     => $row[strtolower('strRepresentanteLegal')],
            'strNifRepresentanteLegal'  => $row[strtolower('strNifRepresentanteLegal')],
            'numTipoNifRepresentanteLegal' => $row[strtolower('numTipoNifRepresentanteLegal')],
            'strEstado'                 => $row[strtolower('strEstado')],
            'numPrecioGrupo'            => $row[strtolower('numPrecioGrupo')],
            'numPrecioPeriodicoGrupo'   => $row[strtolower('numPrecioPeriodicoGrupo')],
            'numPrecioHoraGrupo'        => $row[strtolower('numPrecioHoraGrupo')],
            'numIdRetencion'            => $row[strtolower('numIdRetencion')],
            'strCuentaBeneficios'       => $row[strtolower('strCuentaBeneficios')],
            'strNombreCuentaBeneficios' => $row[strtolower('strNombreCuentaBeneficios')],
            'numCursoMoodle'            => $row[strtolower('numCursoMoodle')],
            'numGrupoMoodle'            => $row[strtolower('numGrupoMoodle')],
            'blnGrupoMoodleEliminado'   => $row[strtolower('blnGrupoMoodleEliminado')],
            'strNombreCortoCursoMoodle' => $row[strtolower('strNombreCortoCursoMoodle')],
            'blnPublicarEnMoodle'       => $row[strtolower('blnPublicarEnMoodle')],
            'strNombreGrupoMoodle'      => $row[strtolower('strNombreGrupoMoodle')],
            'numIdCategoriaMoodle'      => $row[strtolower('numIdCategoriaMoodle')],
            'strUrl'                    => $row[strtolower('strUrl')],
            'memComentarios'            => $row[strtolower('memComentarios')],
        ]);
    }

    public function rules(): array
        {
            return [

                // Siempre valida por lotes
                // Fila.columna
                '0.0' => 'in:numIdGrupo',
                '0.1' => 'in:strCodigoExpediente',
                '0.2' => 'in:strNombreGrupo',
            ];
        }
}
