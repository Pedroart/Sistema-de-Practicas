<?php

namespace app\models;
use core;

class matricula extends core\modelo{
    public function ultimosemestre()
    {
        $this->query("SELECT MAX(`id_semestres`) FROM `semestres` WHERE 1");
        return $this->first();
    }
    
    public function vericador(){
        $this->table = "matricula";
        if (! ($_SESSION['role'] == 3) ){
            return false;
        }

        $usuario = $this->query("SELECT * FROM matricula WHERE id_semestres = (SELECT MAX(id_semestres)FROM semestres) AND id_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        if($this->_num_rows() == 0){
            return false;
        }
        elseif ($data['estado_matricula'] == 0){
            return false;
        }
        
        return true;
    }
}