<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin_Liga']);
        Role::firstOrCreate(['name' => 'admin_Equipo']);
        Role::firstOrCreate(['name' => 'usuario']);

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'adminLiga@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        $user->assignRole('admin_Liga');
    }
}