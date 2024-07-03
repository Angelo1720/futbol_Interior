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
        //18 de julio
        Jugador::create([
            'nombre' => 'Franco',
            'apellido' => 'Sancristobal',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DFC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Brian',
            'apellido' => 'Rodriguez',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::ARQ,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Fernando',
            'apellido' => 'Alonso',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::MC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Matias',
            'apellido' => 'Solano',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Ruben',
            'apellido' => 'Montana',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DFC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Brian',
            'apellido' => 'Sequeira',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::ARQ,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Martín',
            'apellido' => 'Alonso',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::MC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);
        Jugador::create([
            'nombre' => 'Pedro',
            'apellido' => 'Gonzalez',
            'fechaNacimiento' => '2003-09-27',
            'posicion' => Posiciones::DC,
            'goles' => '1',
            'partidosJugados' => '20',
            'idEquipo' => '1'
        ]);

        //Amanecer
        Jugador::create([
            'nombre' => 'Lucas',
            'apellido' => 'Castel',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Angelo',
            'apellido' => 'Sarmiento',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Leo',
            'apellido' => 'Bermin',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Gaston',
            'apellido' => 'Jerez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Rodrigo',
            'apellido' => 'Velazquez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Lucas',
            'apellido' => 'Cartier',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);
        Jugador::create([
            'nombre' => 'Leandro',
            'apellido' => 'Sosa',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '2'
        ]);


        //Barrio obrero
        Jugador::create([
            'nombre' => 'Jeremias',
            'apellido' => 'Díaz',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '0',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'José',
            'apellido' => 'Montes de Oca',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Juarez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Pedro',
            'apellido' => 'Galvan',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Matías',
            'apellido' => 'Martínez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '0',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Samuel',
            'apellido' => 'Barrientos',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Nil',
            'apellido' => 'Pino',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::MC,
            'goles' => '6',
            'partidosJugados' => '35',
            'idEquipo' => '3'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Gomis',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '3'
        ]);

        //Bella vista
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Bravo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Jesus',
            'apellido' => 'Zaragoza',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Josep',
            'apellido' => 'Jaen',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Eloy',
            'apellido' => 'Grande',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Francisco',
            'apellido' => 'Adan',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Cipriano',
            'apellido' => 'Luque',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Hilario',
            'apellido' => 'Caceres',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '4'
        ]);
        Jugador::create([
            'nombre' => 'Alonso',
            'apellido' => 'Gimeno',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '4'
        ]);


        //Bohemios
        Jugador::create([
            'nombre' => 'Ian',
            'apellido' => 'Villegas',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Jose',
            'apellido' => 'Ceballos',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Alfaro',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Pau',
            'apellido' => 'Mateo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'German',
            'apellido' => 'Gilabert',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Oscar',
            'apellido' => 'De la Cruz',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Avelino',
            'apellido' => 'Murillo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '6'
        ]);
        Jugador::create([
            'nombre' => 'Paulino',
            'apellido' => 'Nogales',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '6'
        ]);

        
        //Centenario
        Jugador::create([
            'nombre' => 'Santos',
            'apellido' => 'Arce',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Ahmed',
            'apellido' => 'Quiros',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Alexandre',
            'apellido' => 'Robledo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Alvaro',
            'apellido' => 'Pardo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Juan',
            'apellido' => 'Martín',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Carlos',
            'apellido' => 'Acosta',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Teofilo',
            'apellido' => 'Granado',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '9'
        ]);
        Jugador::create([
            'nombre' => 'Juan Pablo',
            'apellido' => 'Zhu',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '9'
        ]);

        //Estudiantil
        Jugador::create([
            'nombre' => 'Carmelo',
            'apellido' => 'Salas',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Didac',
            'apellido' => 'Heras',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Amador',
            'apellido' => 'Merchan',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Julen',
            'apellido' => 'Freire',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Benjamin',
            'apellido' => 'Sosa',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Francisco',
            'apellido' => 'Lara',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Gregorio',
            'apellido' => 'Vega',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '13'
        ]);
        Jugador::create([
            'nombre' => 'Yeray',
            'apellido' => 'Lillo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '13'
        ]);

        //Guaviyu
        Jugador::create([
            'nombre' => 'Pedro',
            'apellido' => 'Parada',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Dionisio',
            'apellido' => 'Huertas',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Julian',
            'apellido' => 'Zheng',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Manuel',
            'apellido' => 'Zambrano',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Jesus',
            'apellido' => 'Navarrete',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Said',
            'apellido' => 'Wang',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Gael',
            'apellido' => 'Zamora',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '14'
        ]);
        Jugador::create([
            'nombre' => 'Eliseo',
            'apellido' => 'Fernandez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '14'
        ]);

        //Huracan
        Jugador::create([
            'nombre' => 'Julen',
            'apellido' => 'Lopez',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Brian',
            'apellido' => 'Soriano',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Saturnino',
            'apellido' => 'Lobo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Alan',
            'apellido' => 'Cornejo',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Damian',
            'apellido' => 'Medrano',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::ARQ,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Gines',
            'apellido' => 'Rus',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DC,
            'goles' => '6',
            'partidosJugados' => '40',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Pau',
            'apellido' => 'Tudela',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '15'
        ]);
        Jugador::create([
            'nombre' => 'Imanol',
            'apellido' => 'Chaparro',
            'fechaNacimiento' => '2003-10-24',
            'posicion' => Posiciones::DFC,
            'goles' => '13',
            'partidosJugados' => '45',
            'idEquipo' => '15'
        ]);
    }
}