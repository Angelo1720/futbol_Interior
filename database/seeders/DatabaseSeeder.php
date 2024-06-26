<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsersTableSeeder::class);
        $this->call(EquiposTableSeeder::class);
        $this->call(JugadoresTableSeeder::class);
        $this->call(CampeonatosTableSeeder::class);
        $this->call(EdicionesTableSeeder::class);
        $this->call(JugadoresHistoricosSeeder::class);
    }
}