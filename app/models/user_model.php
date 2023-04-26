<?php
namespace app\models;
use core;

class user_model extends core\modelo{
    

    public function loginUsario($correo,$contra){
        $this->table = "usarios";
        $data = $this->where("correo", $correo)->get();

        if ($data){
            if(password_verify($contra,$data["contrasena"])){

                $this->table = "usarios";
                $data = $this->where("correo", $correo);

                $_SESSION['role'] = $data["role"];
                $_SESSION['user_id'] = $data['id_relacion'];
                return true;
            }
        }

        return false;
    }
}