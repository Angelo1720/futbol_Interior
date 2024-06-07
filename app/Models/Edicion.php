<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edicion extends Model
{
    use HasFactory;

    protected $table = 'edicion';

    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaFinal',
        'idCampeon',
        'liguilla',
        'idCampeonato'
    ];

    public $timestamps = false;

    protected $casts = [
        'idCampeon' => 'integer',
        'liguilla' => 'boolean',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'idCampeonato');
    }

    public function edicion_Historia()
    {
        return $this->hasOne(Edicion_Historia::class);
    }

    public function edicion_equipo()
    {
        return $this->hasMany(Edicion_Equipo::class);
    }

    public function equiposParticipantes()
    {
        $listEdicion_Equipos = Edicion_Equipo::where('idEdicion', $this->id)->get();
        $equiposParticipantes = array();
        foreach ($listEdicion_Equipos as $equipoEdicion) {
            $equiposParticipantes[] = Equipo::findOrFail($equipoEdicion->idEquipo);   
        }
        return $equiposParticipantes;
        
    }
}

