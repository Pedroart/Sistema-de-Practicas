<?php

namespace app\models;
use core;

class user extends core\modelo{
    public function vericador($correo,$contra)
    {
        $this->table = "user";
        $this->where("correo","=", $correo);
        if($this->_num_rows() == 0){
            return false;
        }

        $resultados = $this->first();
        
        if($resultados['contra'] == $contra){

            $_SESSION['id_user'] = $resultados['id_user'];
            $_SESSION['role'] = $resultados['id_role'];
            return true;
        }
        return false;
    }
}