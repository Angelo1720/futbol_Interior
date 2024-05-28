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
    ];

    public $timestamps = false;

    protected $casts = [
        'idCampeon' => 'integer',
        'liguilla' => 'boolean',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function edicion_Historia()
    {
        return $this->hasOne(Edicion_Historia::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}