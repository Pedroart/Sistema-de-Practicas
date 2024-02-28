<?php
namespace App\Traits;
use App\Models\User;
use App\Models\Persona;
use App\Models\Userinstitucional;
use Spatie\Permission\Models\Role;
trait InstitucionalUser{

    public function crearUserinstitucional($role,$codigo,$name,$apellido_materno,$apellido_paterno,$escuela_id)
    {
        $user_data = [
            'name' => $name,
            'email' => $codigo."@correo.com",
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
            'codigo'=>$codigo,
            'user_id'=>$UserC->id,
            'personas_id'=>$PersonaC->id,
            'escuela_id'=>$escuela_id
        ]);
        return $UserinstitucionalC;
    }

}
