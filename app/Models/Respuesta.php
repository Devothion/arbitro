<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proceso',
        'id_procesal',
        'descripcion',
        'documento'
    ];

    protected $table = 'respuestas';
}
