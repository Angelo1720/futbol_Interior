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
        'idEscudo',
        'imgCancha',
        'fechaFundacion',
        'nomCancha',
        'latitudCancha',
        'longitudCancha',
        'divisional',
        'cantidadTitulos',
    ];

    public $timestamps = false;

    protected $casts = [
        'cantidadTitulos' => 'integer',
    ];

    public function imagen() 
    {
        return $this->hasMany(Imagen::class);
    }
}
