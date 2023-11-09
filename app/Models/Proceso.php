<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'proceso',
        'med_cau',
        'cuantia',
        'moneda',
        'descripcion',
        'tribunal',
        'data_arb_dni',
        'data_arb_parte',
        'data_arb_estado',
        'id_demandante',
        'id_demandado',
        'dep_monto',
        'dep_fecha',
        'dep_file',
        'contrato',
        'cla_arb',
        'ane_nombre',
        'ane_doc',
        'observaciones'
    ];

    protected $table = 'procesos';
}
