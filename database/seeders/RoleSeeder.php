<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creacion de Roles

        $administrador          =Role::create(['name' => 'administrador']);
        $director_academico     =Role::create(['name' => 'director facultad']);
        $director_academico     =Role::create(['name' => 'director academico']);
        $director_escuela       =Role::create(['name' => 'director escuela']);
        $docente                =Role::create(['name' => 'docente']);
        $asistente_docencia     =Role::create(['name' => 'asistente docencia']);
        $estudiante             =Role::create(['name' => 'estudiante']);

        Permission::create(['name' => 'edit.articles'])->syncRoles([$administrador]);
        Permission::create(['name' => 'prueba'])->syncRoles([$administrador]);


    }
}
