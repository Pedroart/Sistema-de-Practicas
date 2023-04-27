<?php
namespace app\models;
use core;

class user_model extends core\modelo{
    

    public function loginUsario($correo,$contra){
        $this->table = "usuarios";
        $data = $this->query("SELECT * FROM usuarios WHERE correo = '".$correo."'");
        
        if( $data === false){
            return 1;
        }
        
        $data = $this->first();
        
        if( md5($contra) == $data['contrasena']){
    
                    $_SESSION['role'] = $data["role"];
                    $_SESSION['user_id'] = $data['id_relacion'];
                    return true;
        }

        return false;
    }
}