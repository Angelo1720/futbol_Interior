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
            'nombre' => 'Apertura',
            'fechaInicio' => '2024-01-01',
            'fechaFinal' => '2024-04-30',
            'idCampeon' => null,
            'liguilla' => false,
            'idCampeonato' => '1',
        ]);

        Edicion::create([
            'nombre' => 'Clausura',
            'fechaInicio' => '2024-06-01',
            'fechaFinal' => '2024-09-30',
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

        Edicion_Equipo::create([
            'idEquipo' => '3',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '4',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '6',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '9',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '13',
            'idEdicion' => '1'
        ]);        
        
        Edicion_Equipo::create([
            'idEquipo' => '14',
            'idEdicion' => '1'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '15',
            'idEdicion' => '1'
        ]);

        Edicion_Equipo::create([
            'idEquipo' => '1',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '2',
            'idEdicion' => '2'
        ]);

        Edicion_Equipo::create([
            'idEquipo' => '3',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '4',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '6',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '9',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '13',
            'idEdicion' => '2'
        ]);        
        
        Edicion_Equipo::create([
            'idEquipo' => '14',
            'idEdicion' => '2'
        ]);
        
        Edicion_Equipo::create([
            'idEquipo' => '15',
            'idEdicion' => '2'
        ]);
    }
}