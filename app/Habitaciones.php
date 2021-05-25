<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    protected $table = 'habitaciones';
    
    protected $fillable = ['num_habitacion','tipo','capacidad', 'piso', 'mobiliario', 'observaciones'];

    public function scopeNum_hab($query, $num_hab){
        if($num_hab){
            return $query->where('habitaciones.id',$num_hab);
        }
    }

}
