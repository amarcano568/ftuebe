<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajos_realizados extends Model
{
    protected $table = 'trabajos_realizados'; 
    protected $fillable = ['id_trabajo','fecha','id_alumno', 'observaciones','hora_inicio','hora_fin'];

    public function scopeAlumno($query, $alumno){
        if($alumno){
            return $query->where('trabajos_realizados.id_alumno', '=', $alumno);
        }
    }

    public function scopeMes($query, $mes){
        if($mes){
            return $query->whereMonth('trabajos_realizados.fecha', '=', $mes);
        }
    }

    public function scopeAno($query, $ano){
        if($ano){
            return $query->whereYear('trabajos_realizados.fecha', '=', $ano);
        }
    }

}
