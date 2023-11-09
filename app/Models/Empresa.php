<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro',
        'ruc',
        'razon_social',
        'name',
        'tip_calle',
        'nombre_calle',
        'numero',
        'urbanizacion',
        'referencia',
        'departamento',
        'provincia',
        'distrito',
        'telefono',
        'email'
    ];

    protected $table = 'empresas';
}
