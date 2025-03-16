<?php

namespace App\Traits;

use App\Models\Persona;
use App\Models\User;
use App\Models\Userinstitucional;

trait InstitucionalUser
{
    public function crearUserinstitucional($role, $codigo, $name, $apellido_materno, $apellido_paterno, $escuela_id, $email = null)
    {
        // Determinar el email a usar
        $emailAddress = $email ? $email : $codigo.'@unjfsc.edu.pe';

        // Definir los datos del usuario
        $user_data = [
            'name' => $name,
            'email' => $emailAddress,
            'password' => bcrypt($codigo), // Recuerda cambiar esto por una contraseña segura
        ];
        $UserC = User::create($user_data);
        $UserC->assignRole($role);

        $persona_data = [
            'name' => $name,
            'apellido_materno' => $apellido_materno,
            'apellido_paterno' => $apellido_paterno,
        ];
        $PersonaC = Persona::create($persona_data);

        $UserinstitucionalC = Userinstitucional::create([
            'codigo' => $codigo,
            'user_id' => $UserC->id,
            'personas_id' => $PersonaC->id,
            'escuela_id' => $escuela_id,
        ]);

        return $UserinstitucionalC;
    }
}
