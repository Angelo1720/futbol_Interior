<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enum\Divisionales;
use App\Models\Imagen;
use App\Models\Equipo;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = [
            [
                'nombreCorto' => '18 de Julio',
                'nombreCompleto' => 'Club Atlético 18 de Julio - Paysandú',
                'fechaFundacion' => '1980-10-24',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '15'
            ],
            [
                'nombreCorto' => 'Amanecer',
                'nombreCompleto' => 'Deportivo Amanecer',
                'fechaFundacion' => '2000-04-11',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '3'
            ],
            [
                'nombreCorto' => 'Barrio Obrero',
                'nombreCompleto' => 'Club Atlético Barrio Obrero',
                'fechaFundacion' => '1960-02-22',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '42'
            ],
            [
                'nombreCorto' => 'Bella Vista',
                'nombreCompleto' => 'Atlético Bella Vista',
                'fechaFundacion' => '1939-01-11',
                'nomCancha' => 'Parque Don Bosco',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '60'
            ],
            [
                'nombreCorto' => 'Boca de Sacra',
                'nombreCompleto' => 'Club Atlético Boca de Sacra',
                'fechaFundacion' => '1987-09-15',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivC,
                'cantidadTitulos' => '1'
            ],
            [
                'nombreCorto' => 'Bohemios',
                'nombreCompleto' => 'Bohemios Fútbol Club',
                'fechaFundacion' => '1975-05-17',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '17'
            ],
            [
                'nombreCorto' => 'Boston River',
                'nombreCompleto' => 'Club Atlético Boston River',
                'fechaFundacion' => '1916-11-25',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '12'
            ],
            [
                'nombreCorto' => 'Casa Blanca',
                'nombreCompleto' => 'Club Atlético Casa Blanca',
                'fechaFundacion' => '1953-08-02',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '23',
                'participa' => false
            ],
            [
                'nombreCorto' => 'Centenario',
                'nombreCompleto' => 'Club Atlético Centenario Uruguayo',
                'fechaFundacion' => '1906-07-04',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '57'
            ],
            [
                'nombreCorto' => 'Charrua',
                'nombreCompleto' => 'Charrua Fútbol Club',
                'fechaFundacion' => '1937-10-10',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivC,
                'cantidadTitulos' => '23',
                'participa' => false
            ],
            [
                'nombreCorto' => 'Deportivo América',
                'nombreCompleto' => 'Club Deportivo América',
                'fechaFundacion' => '1947-02-12',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '11'
            ],
            [
                'nombreCorto' => 'Esperanza',
                'nombreCompleto' => 'Esperanza Fútbol Club',
                'fechaFundacion' => '1967-03-18',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '9'
            ],
            [
                'nombreCorto' => 'Estudiantil',
                'nombreCompleto' => 'Estudiantil Sanducero Fútbol Club',
                'fechaFundacion' => '1930-03-05',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '60'
            ],
            [
                'nombreCorto' => 'Guaviyú',
                'nombreCompleto' => 'Club Social y Deportivo Guaviyú',
                'fechaFundacion' => '1953-08-02',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '17'
            ],
            [
                'nombreCorto' => 'Huracán',
                'nombreCompleto' => 'Huracán Fútbol Club',
                'fechaFundacion' => '1927-12-05',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '33'
            ],
            [
                'nombreCorto' => 'Independencia',
                'nombreCompleto' => 'Sportivo Independencia Fútbol Club',
                'fechaFundacion' => '1939-02-19',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '47'
            ],
            [
                'nombreCorto' => 'Independiente',
                'nombreCompleto' => 'Club Atlético Independiente',
                'fechaFundacion' => '1997-10-24',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivC,
                'cantidadTitulos' => '2'
            ],
            [
                'nombreCorto' => 'Juventud Unida',
                'nombreCompleto' => 'Club Atlético Juventud Unida',
                'fechaFundacion' => '1953-08-02',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '23'
            ],
            [
                'nombreCorto' => 'Libertad',
                'nombreCompleto' => 'Club Atlético Libertad',
                'fechaFundacion' => '1980-08-25',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '7'
            ],
            [
                'nombreCorto' => 'Litoral',
                'nombreCompleto' => 'Club Atlético Litoral',
                'fechaFundacion' => '1911-05-18',
                'nomCancha' => 'Parque Agustín Rivaben',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '50'
            ],
            [
                'nombreCorto' => 'Los Sauces',
                'nombreCompleto' => 'Club Atlético Los Sauces',
                'fechaFundacion' => '1985-01-22',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '5'
            ],
            [
                'nombreCorto' => 'Nuevo Paysandú',
                'nombreCompleto' => 'Club Nuevo Paysandú',
                'fechaFundacion' => '1932-09-27',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '14'
            ],
            [
                'nombreCorto' => 'Olímpico',
                'nombreCompleto' => 'Olímpico - Paysandú',
                'fechaFundacion' => '1970-04-25',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivC,
                'cantidadTitulos' => '23',
                'participa' => false
            ],
            [
                'nombreCorto' => 'Piedras Coloradas',
                'nombreCompleto' => 'Deportivo Piedras Coloradas',
                'fechaFundacion' => '1999-12-08',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '5'
            ],
            [
                'nombreCorto' => 'Progreso',
                'nombreCompleto' => 'Club Atlético Progreso',
                'fechaFundacion' => '1922-06-10',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '25'
            ],
            [
                'nombreCorto' => 'Queguay',
                'nombreCompleto' => 'Club Fútbol Club',
                'fechaFundacion' => '1955-08-19',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '2'
            ],
            [
                'nombreCorto' => 'Racing',
                'nombreCompleto' => 'Racing Club Paysandú',
                'fechaFundacion' => '1988-08-16',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivC,
                'cantidadTitulos' => '1'
            ],
            [
                'nombreCorto' => 'Rampla Juniors',
                'nombreCompleto' => 'Paysandú Rampla Juniors Fútbol Club',
                'fechaFundacion' => '1960-09-10',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '23'
            ],
            [
                'nombreCorto' => 'San Félix',
                'nombreCompleto' => 'Sporting San Félix',
                'fechaFundacion' => '1990-02-23',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '3'
            ],
            [
                'nombreCorto' => 'Sud América',
                'nombreCompleto' => 'Institución Atlética Sud América',
                'fechaFundacion' => '1921-05-13',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '27'
            ],
            [
                'nombreCorto' => 'Vialidad',
                'nombreCompleto' => 'Club Atlético Vialidad',
                'fechaFundacion' => '1944-01-29',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivB,
                'cantidadTitulos' => '3'
            ],
            [
                'nombreCorto' => 'Wanderers',
                'nombreCompleto' => 'Paysandú Wanderers Fútbol Club',
                'fechaFundacion' => '1900-03-07',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '67'
            ]
        ];

        $imagenes = [
            file_get_contents(public_path("Images/18_de_Julio.png")),
            file_get_contents(public_path("Images/Amanecer.png")),
            file_get_contents(public_path("Images/Barrio_Obrero.png")),
            file_get_contents(public_path("Images/Bella_Vista.png")),
            file_get_contents(public_path("Images/Boca_de_Sacra.png")),
            file_get_contents(public_path("Images/Bohemios.png")),
            file_get_contents(public_path("Images/Boston.png")),
            file_get_contents(public_path("Images/Casa_Blanca.png")),
            file_get_contents(public_path("Images/Centenario.png")),
            file_get_contents(public_path("Images/Charrua.png")),
            file_get_contents(public_path("Images/Deportivo_America.png")),
            file_get_contents(public_path("Images/Esperanza.png")),
            file_get_contents(public_path("Images/Estudiantil.png")),
            file_get_contents(public_path("Images/Guaviyu.png")),
            file_get_contents(public_path("Images/Huracan.png")),
            file_get_contents(public_path("Images/Independencia.png")),
            file_get_contents(public_path("Images/Independiente.png")),
            file_get_contents(public_path("Images/Juventud_Unida.png")),
            file_get_contents(public_path("Images/Libertad.png")),
            file_get_contents(public_path("Images/Litoral.png")),
            file_get_contents(public_path("Images/Los_Sauces.png")),
            file_get_contents(public_path("Images/Nuevo_Paysandu.png")),
            file_get_contents(public_path("Images/Olimpico.png")),
            file_get_contents(public_path("Images/Piedras_Coloradas.png")),
            file_get_contents(public_path("Images/Progreso.png")),
            file_get_contents(public_path("Images/Queguay.png")),
            file_get_contents(public_path("Images/Racing.png")),
            file_get_contents(public_path("Images/Rampla.png")),
            file_get_contents(public_path("Images/San_Felix.png")),
            file_get_contents(public_path("Images/Sud_America.png")),
            file_get_contents(public_path("Images/Vialidad.png")),
            file_get_contents(public_path("Images/Wanderers.png")),
        ];

        $i = 0;

        foreach ($equipos as $equipoData) {
            $equipo = Equipo::updateOrCreate($equipoData);
            $imagen = Imagen::updateOrCreate(['equipo_id' => $equipo->id], ['base64' => base64_encode($imagenes[$i])]);
            $equipo->idEscudo = $imagen->id;
            $equipo->save();
            $i += 1;
        }
    }
}