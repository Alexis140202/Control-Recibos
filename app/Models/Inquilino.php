<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    /**
     * Nombre de la tabla.
     *
     * @var string
     */
    protected $table = 'inquilino';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'telefono',
        'dni',
        'correo',
        'cuota',
        'fecha_ingreso',
    ];

    /**
     * Conversión de atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_ingreso' => 'date:Y-m-d',
    ];
}