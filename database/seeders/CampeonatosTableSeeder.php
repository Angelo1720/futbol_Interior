<?php

namespace Database\Seeders;

use App\Models\Campeonato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampeonatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campeonato::create([
            'nombre' => 'Primera Divisional',
            'division' => 'Primera "A"',
            'tipoCampeonato' => 'false',
        ]);

        Campeonato::create([
            'nombre' => 'Segunda Divisional',
            'division' => 'Segunda "B"',
            'tipoCampeonato' => 'false',
        ]);

        Campeonato::create([
            'nombre' => 'Tercera Divisional',
            'division' => 'Tercera "C"',
            'tipoCampeonato' => 'false',
        ]);


    }
}