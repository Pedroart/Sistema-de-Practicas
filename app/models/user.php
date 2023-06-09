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

            $this->query("SELECT MAX(`id_semestres`), `nombre_semestres` FROM `semestres`");
            $_SESSION['semestre'] =$this->first()['nombre_semestres'];
            $_SESSION['DATA_ALUMNO']=$this->Datos_Alumno($resultados['id_user']);
            return true;
        }
        return false;
    }
    
    public function Datos_Alumno($id_alumno)
    {
        $sql = "SELECT `nombre`, `apellido_paterno`, `apellido_materno`, `DNI`,`direccion`, `correo`, `celular`, `departamento`, departamento_pais.nombre_departamento, `provincia`, provincia.nombre_provincia, `distrito`, distrito.nombre_distrito\n"
        . "FROM `persona` \n"
        . "left JOIN departamento_pais on persona.departamento = departamento_pais.id_departamento\n"
        . "left JOIN provincia on persona.provincia = provincia.id_provincia\n"
        . "left JOIN distrito on persona.distrito = distrito.id_distrito\n"
        . "WHERE `id_persona` = (SELECT `id_persona` FROM  `alumno` WHERE `id_alumno` = 332131002 );";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function buscar_id_persona_estudiante($id_alumno) {
        $sql = "SELECT `id_persona` FROM  `alumno` WHERE `id_alumno` = {$id_alumno}";
        $this->query($sql);
        $data = $this->first();
        return $data; 
    }

    public function actualizar_DatosSecundarios_Alumno($id,$datos) {
        
        $this->table= "persona";
        return $this->update4key($id,$datos,"id_persona");
    }
}