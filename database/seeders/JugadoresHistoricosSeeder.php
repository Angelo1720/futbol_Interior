<?php

namespace Database\Seeders;

use App\Models\Jugador_Historico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JugadoresHistoricosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jugador_Historico::create([
            'nombre' => 'Julio “Colita”',
            'apellido' => 'Merientel',
            'fechaNacimiento' => '1977-09-27',
            'historia' => 'Una de esas “apariciones” que cada tanto lanza a los campos del fútbol el Atlético Bella Vista. Poseedor de una superior calidad técnica, la que sólo está reservada para aquellos que “nacieron” futbolistas.
Su categoría fue la diferencia. Innata habilidad, una gran pegada y su talento fue creador de muchos goles personales y pases-gol a sus compañeros.
Nacional profesional lo llevó y soñaba que fuera otro “Ciengramos” Rodríguez. Y pintó para serlo en su corto pasaje por el tricolor. Pero el barrio y su entorno pudieron más.
Julio César Merentiel, el popular “Colita”, renunció a ser una figura en el profesionalismo, prefirió ser como él quería ser. Se colocó nuevamente la auriblanca de
su Bella Vista para seguir divirtiéndose él y los hinchas del buen fútbol.'
        ]);
        Jugador_Historico::create([
            'nombre' => 'Luis Alfredo',
            'apellido' => 'Collares ',
            'fechaNacimiento' => '1981-02-12',
            'historia' => 'En la ciudad de Guichón nació Luis Alfredo Collares. Siendo muy chico su familia se radica en Paysandú.Comienza a jugar en Cerro y pasa luego a Wanderers. Fue campeón con Wanderers en 1963, 1964, 1966, 1969 y 1968 en Primera División. En el 80 ascendió con los bohemios a Primera y con 40 años se retiró del fútbol. Dos títulos del Litoral y estuvo en el equipo del 71 que por primera vez logró el título del
Interior. Anduvo por el 60 en Peñarol, aquel del Tito Goncalvez, Spencer, Joya, Sasia y aquellos
“monstruos” que le dieron mil triunfos. Por Defensor en 68 y 69. Un formidable jugador. Completo. Siempre jugaba bien y nunca se lesionaba.
El entonces intendente municipal Jorge Larrañaga, lo eligió para dar el puntapié inaugural en el remozado Estadio Artigas en junio de 1995, en la antesala de la serie de la Copa América.'
        ]);
        Jugador_Historico::create([
            'nombre' => 'Juan Carlos',
            'apellido' => ' Fleitas ',
            'fechaNacimiento' => '1970-08-17',
            'historia' => 'Juan Carlos Fleitas, conocido popularmente como “La Perica” (por su baja estatura y un físico erguido) era todo talento. Un formidable “armador” de fútbol. Notable pasador además de goleador. Le pegaba muy bien a la pelota. Era difícil en esos tiempos emigrar
al profesionalismo porque en la capital abundaban grandes jugadores. Sin embargo tuvo un pasaje por River Plate montevideano.
En la selección integró el recordado equipo de 1945 cuando en el “Dickinson” le ganó 3 a 0 la final a los salteños. Completó el primer trienio con los títulos del 46 y 47.
Títulos en el Campeonato del Litoral: 1941, 45, 46 y 47.
Campeón del “Honor” en Paysandú:
1940: Estudiantil Sanducero
1942: River Plate 
1949: River Plate
1953: Paysandú Wanderers.'
        ]);
    }
}
