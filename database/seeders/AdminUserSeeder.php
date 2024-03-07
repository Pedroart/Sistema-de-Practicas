<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Userinstitucional;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador y asignarle el rol
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('87654321'), // Recuerda cambiar esto por una contraseña segura
        ]);

        $adminUser->assignRole('administrador');

        $sistemaUser = User::create([
            'name' => 'Sistema',
            'email' => 'Sistema@admin.com',
            'password' => bcrypt('87654321'), // Recuerda cambiar esto por una contraseña segura
        ]);

        $sistemaUser->assignRole('administrador');

        $estudiante = User::create([
            'name' => 'estudiante',
            'email' => 'estudiante@admin.com',
            'password' => bcrypt('87654321'), // Recuerda cambiar esto por una contraseña segura
        ]);

        $estudianteIntitu = Userinstitucional::create([
            'codigo'=>'0123456789',
            'user_id'=>$estudiante->id,
        ]);

        $estudiante->assignRole('estudiante');
        $estudiante->assignRole('matriculado');
    }
}
