<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador_Historico extends Model
{
    use HasFactory;
    protected $table = 'jugadores_historicos';

    protected $fillable = [
        'nombre',
        'apellido',
        'fechaNacimiento',
        'historia',
        'idPortada'
    ];

    public $timestamps = false;

   public function traerPortada(){
    $image = Imagen::find($this->idPortada);
    return $image;
   }
}
