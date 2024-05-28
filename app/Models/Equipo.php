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
        'participa',
    ];

    public $timestamps = false;

    protected $casts = [
        'cantidadTitulos' => 'integer',
        'participa' => 'boolean',
    ];

    public function imagen()
    {
        return $this->hasMany(Imagen::class);
    }


    public function traerEscudo()
    {
        $image = Imagen::find($this->idEscudo);
        return $image;
    }

    public function traerCancha()
    {
        $image = Imagen::find($this->imgCancha);
        return $image;
    }

    public function ediciones()
    {
        return $this->belongsToMany(Edicion::class);
    }
}