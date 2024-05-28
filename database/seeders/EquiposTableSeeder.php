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
                'nombreCorto' => 'Juventud Unida',
                'nombreCompleto' => 'Club Atlético Juventud Unida',
                'fechaFundacion' => '1953-08-02',
                'nomCancha' => 'NO',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '23'
            ],
            [
                'nombreCorto' => 'Litoral',
                'nombreCompleto' => 'Club Atlético Litoral',
                'fechaFundacion' => '1911-05-18',
                'nomCancha' => 'Parque Agustín Rivaben',
                'divisional' => Divisionales::DivA,
                'cantidadTitulos' => '50'
            ]
        ];

        $imagenes = [
            file_get_contents(public_path("Images/Juventud_Unida.png")),
            file_get_contents(public_path("Images/Litoral.png")),
        ];

        $i = 0;

        foreach ($equipos as $equipoData) 
        {
            $equipo = Equipo::updateOrCreate($equipoData);
            $imagen = Imagen::updateOrCreate(['equipo_id' => $equipo->id], ['base64' => base64_encode($imagenes[$i])]);
            $equipo->idEscudo = $imagen->id;
            $equipo->save();
            $i += 1;
        }
    }
}
