<?php

namespace Database\Seeders;

use App\Enum\Posiciones;
use App\Models\Jugador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JugadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jugador::create([
            'nombre' => 'Franco',
            'apellido' => 'Sancristóbal',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DFC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Nacho',
            'apellido' => 'Sena',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
    }
}