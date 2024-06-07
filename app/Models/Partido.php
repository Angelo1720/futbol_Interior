<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';

    protected $fillable = [
        'idEdicion',
        'fecha',
        'nroJornada',
        'nombreJornada',
        'nomEquipoLocal',
        'nomEquipoVisitante',
        'dataEquipoLocal',
        'dataEquipoVisitante',
        'goles'
    ];

    protected $casts = [
        'nroJornada' => 'integer',
        'idEdicion' => 'integer'
    ];

    public $timestamps = false;

    public function edicion()
    {
        //belongsTo(Edicion::class);
    }

}
