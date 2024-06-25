<?php

namespace App\Models;

use App\Http\Controllers\JugadorHistoricoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = [
        'id',
        'equipo_id',
        'nombreImg',
        'base64',
    ];
    protected $casts = [
        'id' => 'integer',
        'equipo_id' => 'integer'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function edicion_historia()
    {
        return $this->hasMany(Edicion_historia::class);
    }

    public function jugadoresHistoricos()
    {
        return $this->hasMany(Jugador_Historico::class);
    }
}
