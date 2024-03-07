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
        $matriculado             =Role::create(['name' => 'matriculado']);

        Permission::create(['name' => 'edit'])->syncRoles([
            $administrador,
            $director_academico,
            $director_academico,
            $director_escuela,
            $docente,
            $asistente_docencia,
            $estudiante]);
        Permission::create(['name' => 'files.conf'])->syncRoles([$administrador,$director_academico,$director_academico,$director_escuela,$docente]);

        Permission::create(['name' => 'matricula.view'])->syncRoles([$administrador,$director_academico,$director_academico,$director_escuela,$docente,$asistente_docencia,$estudiante]);
        Permission::create(['name' => 'matricula.create'])->syncRoles([$administrador,$estudiante]);
        Permission::create(['name' => 'matricula.edit'])->syncRoles([$administrador,$director_academico,$director_academico,$director_escuela,$docente,$asistente_docencia]);
        Permission::create(['name' => 'matricula.delete'])->syncRoles([$administrador,$estudiante]);
    }
}
