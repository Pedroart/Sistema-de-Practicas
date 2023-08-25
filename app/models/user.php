<?php

namespace app\models;
use core;

class user extends core\modelo{
    public function vericador($correo,$contra)
    {
        $this->table = "users";
        $this->where("user_correo","=", $correo);
        if($this->_num_rows() == 0){
            return false;
        }

        $resultados = $this->first();
        
        if($resultados['user_contra'] == md5($contra)){

            $_SESSION['id_user'] = $resultados['user_role_id'];
            $_SESSION['role'] = $resultados['user_type_role'];

            $this->query("SELECT * FROM `semestre`  WHERE `semestre_id` = (SELECT MAX(`semestre_id`) FROM semestre)");
            $data = $this->first();
            $_SESSION['semestre'] =$data['semestre_nombre'];
            $_SESSION['id_semestre'] =$data['semestre_id'];
            return true;
        }
        return false;
    }
    
    public function Datos_Alumno($id_alumno){
        $sql = "SELECT * FROM `alumnos`\n"

        . "LEFT JOIN personas on personas.persona_id = alumnos.user_persona_id\n"

        . "LEFT JOIN distritos_pais on distritos_pais.distrito_id = personas.persona_ubi\n"

        . "LEFT JOIN provincias_pais on provincias_pais.provincia_id = distritos_pais.distrito_padre_id\n"

        . "LEFT JOIN departamentos_pais on departamentos_pais.departamento_id = provincias_pais.provincia_padre_id\n"
        . "WHERE `alumno_codigo` = '{$id_alumno}';";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function buscar_id_persona_estudiante($id_alumno) {
        $sql = "SELECT `user_persona_id` FROM  `alumnos` WHERE `alumno_codigo` = {$id_alumno}";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function actualizar_DatosSecundarios_Alumno($id,$datos) {
        
        $this->table= "personas";
        return $this->update4key($id,$datos,"persona_id");
    }
}