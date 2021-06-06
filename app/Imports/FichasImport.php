<?php

namespace App\Imports;

use App\Fichas_alumnos_tmp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class FichasImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fichas_alumnos_tmp([            
            'numIdFichaAlumno' => $row[strtolower('numIdFichaAlumno')],
            'strResumenInforme' => $row[strtolower('strResumenInforme')],
            'fecFecha' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('fecFecha')]), 
            'memComentarios' => $row[strtolower('memComentarios')],
            'numNota' => $row[strtolower('numNota')],
            'numIdCursoAcademico' => $row[strtolower('numIdCursoAcademico')],   
            'numIdConvocatoria' => $row[strtolower('numIdConvocatoria')],
            'blnDefinitivo' => $row[strtolower('blnDefinitivo')],
            'numIdAlumno' => $row[strtolower('numIdAlumno')], 
            'numIdCalificacion' => $row[strtolower('numIdCalificacion')],   
            'numIdClase' => $row[strtolower('numIdClase')],
            'numIdGrupo' => $row[strtolower('numIdGrupo')],
            'blnVisibleConnect' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('blnVisibleConnect')]),   
            'blnNoMostrarNumericoConnect' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('blnNoMostrarNumericoConnect')]),
            'numIdAsignatura' => $row[strtolower('numIdAsignatura')],
            'blnBoletinPublicadoConnect' => $row[strtolower('blnBoletinPublicadoConnect')],   
            'numIdCliente' => $row[strtolower('numIdCliente')],
            'numEstadoComunicacion' => $row[strtolower('numEstadoComunicacion')],
            'numIdPersonal' => $row[strtolower('numIdPersonal')],
            'fecCambioEstadoComunicacion' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('fecCambioEstadoComunicacion')]),  
            'strEstadoComunicacion' => $row[strtolower('strEstadoComunicacion')], 
            'blnFirmada' => $row[strtolower('blnFirmada')],
            'fecFirma' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[strtolower('fecFirma')]),                       
        ]);
    }

    public function rules(): array
        {
            return [

                // Siempre valida por lotes
                // Fila.columna
                '0.0' => 'in:numIdFichaAlumno',
                '0.1' => 'in:strResumenInforme',
                '0.2' => 'in:fecFecha',
            ];
        }
}
