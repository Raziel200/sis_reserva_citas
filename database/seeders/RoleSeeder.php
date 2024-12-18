<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::create(['name'=>'admin']);
        $secretariaRole = Role::create(['name'=>'secretaria']);
        $doctorRole = Role::create(['name'=>'doctor']);
        $pacienteRole = Role::create(['name'=>'paciente']);
        $usuarioRole = Role::create(['name'=>'usuario']);


         //Rutas para el admin-usuarios
     Permission::create(['name'=>'admin.index']);

     //Rutas para el admin-usuarios
     Permission::create(['name'=>'admin.usuarios.index'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.create'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.store'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.show'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.edit'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.update'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.confirmDelete'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.usuarios.destroy'])->syncRoles([$adminRole]);

     //Rutas para el admin-secretarias
     Permission::create(['name'=>'admin.secretarias.index'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.create'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.store'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.show'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.edit'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretaria.update'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.confirmDelete'])->syncRoles([$adminRole]);
     Permission::create(['name'=>'admin.secretarias.destroy'])->syncRoles([$adminRole]);

     //Rutas para el admin-pacientes
     Permission::create(['name'=>'admin.pacientes.index'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.create'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.store'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.show'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.edit'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.update'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.confirmDelete'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.pacientes.destroy'])->syncRoles([$adminRole,$secretariaRole]);

     //Rutas para el admin-consultorios
     Permission::create(['name'=>'admin.consultorios.index'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.create'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.store'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.show'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.edit'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.update'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.confirmDelete'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.consultorios.destroy'])->syncRoles([$adminRole,$secretariaRole]);

     //Rutas para el admin-doctores
     Permission::create(['name'=>'admin.doctores.index'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.create'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.store'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.show'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.edit'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.update'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.confirmDelete'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.doctores.destroy'])->syncRoles([$adminRole,$secretariaRole]);

     //Rutas para el admin-horarios
     Permission::create(['name'=>'admin.horarios.index'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.create'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.store'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.show'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.edit'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.update'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.confirmDelete'])->syncRoles([$adminRole,$secretariaRole]);
     Permission::create(['name'=>'admin.horarios.destroy'])->syncRoles([$adminRole,$secretariaRole]);
     

     Permission::create(['name'=>'admin.horarios.cargar_datos_consultorios'])->syncRoles([$adminRole,$secretariaRole]);
     
    }

    

}
