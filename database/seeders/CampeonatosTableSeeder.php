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
            'id' => '1',
            'nombre' => 'Campeonato Nacional',
            'division' => 'Primera "A"',
            'tipoCampeonato' => 'false',
        ]);
    }
}