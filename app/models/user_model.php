<?php
namespace app\models;
use core;

class user_model extends core\modelo{
    

    public function loginUsario($correo,$contra){
        $this->table = "usuarios";
        $data = $this->query("SELECT * FROM usuarios WHERE Correo = '".$correo."'");
        
        
        $data = $this->first();
        
        if (is_null($data)){
            return false;
        }

        if( md5($contra) == $data['Contrasena']){
    
                    $_SESSION['role'] = $data["Role"];
                    $_SESSION['user_id'] = $data['ID'];
                    return true;
        }

        return false;
    }
}