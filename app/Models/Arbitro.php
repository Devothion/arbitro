<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'ape_pat',
        'ape_mat',
        'name',
        'telefono',
        'email',
        'tip_calle',
        'nombre_calle',
        'numero',
        'urbanizacion',
        'referencia',
        'departamento',
        'provincia',
        'distrito',
        'numero_reg',
        'file_reg',
        'profesion',
        'especialidad',
        'proceso'
    ];

    protected $table = 'arbitros';
}
