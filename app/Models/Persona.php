<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro',
        'dni',
        'ape_pat',
        'ape_mat',
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

    protected $table = 'personas';
}
