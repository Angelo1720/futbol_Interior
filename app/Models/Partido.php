<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';

    protected $fillable = [
        'fecha',
        'nroJornada',
        'nombreJornada',
        'equipoLocal',
        'equipoVisitante',
        'goles'
    ];

    protected $casts = [
        'equipoLocal' => 'json',
        'equipoVisitante' => 'json',
        'goles' => 'json',
        'nroJornada' => 'integer',
        'fecha' => 'string'
    ];
    protected $timestamps = false;

    public function edicion()
    {
        //belongsTo(Edicion::class);
    }

}
