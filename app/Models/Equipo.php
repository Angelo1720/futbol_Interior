<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected $fillable = [
        'nombreCorto',
        'nombreCompleto',
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

    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'idEquipo');
    }
    public static function traerJugadores() 
    {
        $jugadoresPorEquipo = [];

        // Obtener todos los equipos con sus jugadores
        $equipos = self::with('jugadores')->get();
        
        foreach ($equipos as $equipo) {
            $jugadoresPorEquipo[$equipo->nombre] = [
                'Arqueros' => [],
                'Defensas' => [],
                'Mediocampistas' => [],
                'Delanteros' => []
            ];
            
            foreach ($equipo->jugadores as $jugador) {
                
                switch ($jugador->posicion) {
                    case 'Arquero':
                        $jugadoresPorEquipo[$equipo->nombre]['Arqueros'][] = $jugador->nombre . ' ' . $jugador->apellido;
                        break;
                    case 'Defensa central':
                    case 'Lateral izquierdo':
                    case 'Lateral derecho':
                        $jugadoresPorEquipo[$equipo->nombre]['Defensas'][] = $jugador->nombre . ' ' . $jugador->apellido;
                        break;
                    case 'Mediocampista':
                    case 'Mediocampista defensivo':
                    case 'Mediocampista derecho':
                    case 'Mediocampista izquierdo':
                    case 'Mediapunta':
                        $jugadoresPorEquipo[$equipo->nombre]['Mediocampistas'][] = $jugador->nombre . ' ' . $jugador->apellido;
                        break;
                    case 'Delantero centro':
                    case 'Extremo izquierdo':
                    case 'Extremo derecho':
                        $jugadoresPorEquipo[$equipo->nombre]['Delanteros'][] = $jugador->nombre . ' ' . $jugador->apellido;
                        break;
                }
            }
        }
        return $jugadoresPorEquipo;
    }
    
    public function ediciones()
    {
        return $this->belongsToMany(Edicion::class);
    }
}