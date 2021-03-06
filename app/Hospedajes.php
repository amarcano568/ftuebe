<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedajes extends Model
{
    protected $table = 'hospedajes';
    protected $fillable = ['num_habitacion','entrada','salida', 'observaciones'];

    public function scopeHabitaciones($query, $habitacion){
        if($habitacion){
            return $query->where('hospedajes.num_habitacion', '=', $habitacion);
        }
    }

}
