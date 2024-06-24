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
            'apellido' => 'S',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DFC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Brian',
            'apellido' => 'R',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::ARQ,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Fernando',
            'apellido' => 'A',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::MC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Matias',
            'apellido' => 'S',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Lucas',
            'apellido' => 'C',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Angelo',
            'apellido' => 'S',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Leo',
            'apellido' => 'B',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Gaston',
            'apellido' => 'Z',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Rodrigo',
            'apellido' => 'C',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Martin',
            'apellido' => 'D',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '0',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'H',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Pedro',
            'apellido' => 'G',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Ramiro',
            'apellido' => 'P',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Genaro',
            'apellido' => 'D',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Bernardo',
            'apellido' => 'F',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '4'
        ]);
    }
}