<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'subir-fichero-nuevos-alumnos',
        'delete-fichero-importar-alumno',
        'listar-estudiantes',
        'subir-fichero-fichas-alumnos',
        'subir-fichero-grupos',
        'subir-fichero-matriculas-grupos',
        'subir-fichero-matriculas'
    ];
}
