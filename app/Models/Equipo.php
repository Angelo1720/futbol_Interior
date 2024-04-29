<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
        'escudo',
        'fechaFundacion',
        'nomCancha',
        'latitudCancha',
        'longitudCancha',
        'divisional',
        'cantidadTitulos',
    ];

    protected $casts = [
        'fechaFundacion' => 'dateTime',
        'divisional' => 'string',
        'cantidadTitulos' => 'integer',
    ];
}
