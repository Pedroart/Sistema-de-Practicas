<?php

namespace app\models;
use core;
use app;

class matricula extends core\modelo{
    public function ultimosemestre()
    {
        $this->query("SELECT MAX(`id_semestres`), `nombre_semestres` FROM `semestres`");
        return $this->first()['nombre_semestres'];
    }
    
    public function vericador(){
        $this->table = "matricula";
        if (! ($_SESSION['role'] == 3) ){
            return false;
        }
        $_SESSION['id_semestre']  =2;
        $usuario = $this->query("SELECT * FROM matricula WHERE matricula_id_semestre = ".$_SESSION['id_semestre']." AND matricula_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        if($this->_num_rows() == 0){
            return false;
        }
        elseif(is_null($data['matricula_ficha'])){
            return false;
        }   
        return true;
    }
    public function estado()
    {
        $this->table = "matricula";
        if (! ($_SESSION['role'] == 3) ){
            return false;
        }

        $usuario = $this->query("SELECT * FROM matricula WHERE matricula_id_semestre =  {$_SESSION['id_semestre']} AND matricula_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        if($this->_num_rows() == 0){
            return false;
        }
        elseif(is_null($data['matricula_ficha'])){
            return false;
        } 
        elseif($data['matricula_estado']!=3){
            return false;
        } 
        return true;
    }
    public function createe()
    {
        
        $base = new app\models\documentos();
        $matricula=$base-> create_files_post('ficha_matricula',"application/pdf");
        if(is_null($matricula)){
            return false;
        }

        $record=$base-> create_files_post('RecordAcademico',"application/pdf");    
        if(is_null($record)){
            return false;
        }
        if (!$this->estado()){
            
            $inset = [
                "matricula_id_semestre" => $_SESSION['id_semestre'],
                "matricula_alumno" => $_SESSION['id_user'],
                "matricula_ficha" => $matricula,
                "matricula_record_academico" => $record,
                "matricula_fecha" => date('Y-m-d'),
                "matricula_estado"=>2,
            ];
            $this->table = 'matricula';
            $id = $this->create($inset);
            return true;
        }elseif($this->estado()!=3   ){
            $data = $this->get_();
            $fecha = date('Y-m-d');
            $this->query("UPDATE `matricula` SET `matricula_ficha`={$matricula},`matricula_record_academico`={$record},`matricula_fecha`='{$fecha}' WHERE `matricula_id_semestre` = {$_SESSION['id_semestre']} AND `matricula_alumno` = ".$_SESSION['id_user']);
            return true;
        }

    }

    public function aceptado($id)
    {
        $this->query("UPDATE `matricula` SET `matricula_estado`=3 WHERE `matricula_id_semestre` = {$_SESSION['id_semestre']} AND `matricula_alumno` = ".$id);
    }
    public function revisar($idRole, $idUser, $cuerpo)
    {
        $comentarios = new \app\models\Comentarios();
        $idComentario = $comentarios->createComentario($idRole, $idUser, $cuerpo); 
    }

    public function rechazar($id)
    {
        $this->query("DELETE FROM `matricula` WHERE `matricula_id_semestre` = {$_SESSION['id_semestre']} AND `matricula_alumno` = ".$id);   
    }

    public function get_($id=null){
        if(is_null($id)){
            $id = $_SESSION['id_user'];
        }
        $usuario = $this->query("SELECT * FROM matricula WHERE matricula_id_semestre = {$_SESSION['id_semestre']} AND 	matricula_alumno = ".$id);
        $data = $this->first();
        return $data;  
    }

    public function get_documentos_ids($id = null)
    {
        $data = $this->get_($id);
        return [$data['matricula_ficha'],$data['matricula_record_academico']];
    }

    public function get_documentes_comentarios($id=null){
        
        if(is_null($id)){
            return [];
        }

        $data = $this->get_($id);
        if (is_null($data)){
            return [];
        }
        $base = new app\models\documentos();

        $Ficha=$base->get_documento_direc($data['matricula_ficha']);
        $matricula=$base->get_documento_direc($data['matricula_record_academico']);
        return [$Ficha,$matricula];
    }

    public function delet_PDFs()
    {
        
        $base = new app\models\documentos();
        $matricula="NULL";
        $record="NULL";
        
        $data = $this->get_();
        $base = new app\models\documentos();
        $base->delete_file($data['matricula_ficha']);
        $base->delete_file($data['matricula_record_academico']);
        $this->query("UPDATE `matricula` SET `matricula_ficha`={$matricula},`matricula_record_academico`={$record} WHERE `matricula_id_semestre` = {$_SESSION['id_semestre']} AND `matricula_alumno` = ".$_SESSION['id_user']);
        
        return true;
    }

    public function get_list(){
        $sql = "SELECT * FROM `matricula` \n"
        . "INNER JOIN alumnos on alumnos.alumno_codigo = matricula.matricula_alumno\n"
        . "INNER JOIN personas on personas.persona_id = alumnos.user_persona_id\n"
        . "INNER JOIN testados_proceso on testados_proceso.tep_id_estado = matricula.matricula_estado\n"
        . "WHERE `matricula_estado`!=3;";

        $this->query($sql);
        return  $this->get();
    }
}