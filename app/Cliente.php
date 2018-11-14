<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'name',
        'descripcion',
        'direccion',
        'contacto',
        'telefono',
        'inicio_contrato',
        'final_contrato',
        'estado',
    ];
}
