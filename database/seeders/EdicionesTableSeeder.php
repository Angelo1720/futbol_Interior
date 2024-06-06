<?php

namespace Database\Seeders;

use App\Models\Edicion;
use App\Models\Edicion_Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdicionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edicion::create([
            'id' => '1',
            'nombre' => 'Apertura',
            'fechaInicio' => '2024-01-01',
            'fechaFinal' => '2024-12-30',
            'idCampeon' => null,
            'liguilla' => false,
            'idCampeonato' => '1',
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '1',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '2',
            'idEdicion' => '1'
        ]);
    }
}