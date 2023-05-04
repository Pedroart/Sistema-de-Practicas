<?php
namespace app\models;
use core;

class matricula extends core\modelo{
    

    public function estaMatriculado(){
        $this->table = "semestre_matricula";
        $data = $this->where("Id_Alumno",'=',$_SESSION['user_id']);     
        if (mysqli_num_rows($data) > 0){
            $data = $this->first();
            if($data['Estado']==1){
                return true;
            }else{
                return false;
            }
        }
        

        return false;
    }


    public function subirDatasemetres($semestre,$id1,$id2){
        $this->table = "semestre_matricula";
        $data = $this->create(["Id_Semestre"=>$semestre,"Record_Academico"=>$id1, "Ficha_de_Matricula"=>$id2,"Id_Alumno"=>$_SESSION['user_id'],"Estado"=>0]);     
        return $data;
    }
    public function subirSolicitud($Nom_Documento){
        $this->table = "documento";
        $data = $this->create(["Nom_Documento"=>$Nom_Documento]);     
        return $data;
    }
}