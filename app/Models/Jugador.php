<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = 'jugadores';
    protected $fillable = [
        'nombre',
        'apellido',
        'fechaNacimiento',
        'posicion',
        'goles',
        'partidosJugados',
        'idEquipo'
    ];
    protected $casts = [
        'goles' => 'integer',
        'partidosJugados' => 'integer',
        'idEquipo' => 'integer',
    ];
    public $timestamps = false;

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idEquipo');
    }

    public static function jugadoresNotInEquipo($idEquipo)
    {
        return self::whereNotIn('idEquipo', [$idEquipo])
            ->orWhereNull('idEquipo')
            ->orderBy('apellido')
            ->get();
    }
}
