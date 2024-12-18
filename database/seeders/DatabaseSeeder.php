<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamada a otros seeders
        $this->call([RoleSeeder::class]);
        // Crear usuarios
        $admin = User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        $secretaria = User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        $doctor = User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        $paciente = User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        $usuario = User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('123456789')
        ]);

        // Asignar roles a los usuarios
        $admin->assignRole('admin');
        $secretaria->assignRole('secretaria');
        $doctor->assignRole('doctor');
        $paciente->assignRole('paciente');
        $usuario->assignRole('usuario');

       
        // Rutas para el admin-citas

        // Llamada a otros seeders
        $this->call([Pacienteseeder::class]);
    }
}
