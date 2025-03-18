<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Userinstitucional;
use Illuminate\Database\Seeder;

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

        /*

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
            'codigo' => '0123456789',
            'user_id' => $estudiante->id,
            'escuela_id' => 1,
        ]);

        $estudiante->assignRole('estudiante');
        $estudiante->assignRole('matriculado');

        $this->crearUsuario('decano_facultad', 'decano_facultad@admin.com', 'decano de facultad');
        $this->crearUsuario('director_academico', 'director_academico@admin.com', 'director academico');
        $this->crearUsuario('director_escuela', 'director_escuela@admin.com', 'director escuela');
        $this->crearUsuario('docente_titular', 'docente_titular@admin.com', 'docente titular');
        $this->crearUsuario('docente_supervisor', 'docente_supervisor@admin.com', 'docente supervisor');
    }

    protected function crearUsuario($nombre, $email, $rol)
    {
        // Generar un código aleatorio de 10 dígitos
        $codigoAleatorio = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);

        // Crear el usuario
        $usuario = User::create([
            'name' => $nombre,
            'email' => $email,
            'password' => bcrypt('87654321'), // Recuerda cambiar esto por una contraseña segura
        ]);

        // Crear el usuario institucional con el código aleatorio
        $usuarioInstitucional = Userinstitucional::create([
            'codigo' => $codigoAleatorio,
            'user_id' => $usuario->id,
            'escuela_id' => 1, // ID de la escuela
        ]);

        // Asignar el rol al usuario
        $usuario->assignRole($rol);
        */
    }
        
}
