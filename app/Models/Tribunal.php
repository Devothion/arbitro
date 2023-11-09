<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proceso',
        'dni',
        'parte',
        'estado'
    ];

    protected $table = 'tribunals';
}
