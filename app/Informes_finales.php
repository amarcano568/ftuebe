<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informes_finales extends Model
{
    protected $table = 'informes_finales'; 

    protected $fillable = [
        'tipo',
        'estudio',                      
        'periodo',                      
        'dato1',
        'dato2',               
        'dato3',
        'dato4',             
        'dato5',
        'dato6',
        'dato7',
        'dato8',
        'dato9',
        'dato10',                          
        'dato11',         
        'dato12',         
        'dato13',         
        'dato14',         
];
}
