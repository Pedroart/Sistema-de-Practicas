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

        $usuario = $this->query("SELECT * FROM matricula WHERE id_semestres = (SELECT MAX(id_semestres)FROM semestres) AND id_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        if($this->_num_rows() == 0){
            return false;
        }
        elseif(is_null($data['ficha_matricula'])){
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

        $usuario = $this->query("SELECT * FROM matricula WHERE id_semestres = (SELECT MAX(id_semestres)FROM semestres) AND id_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        if($this->_num_rows() == 0){
            return false;
        }
        elseif(is_null($data['ficha_matricula'])){
            return "actualizar";
        } 
        return $data['estado_matricula'];
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
            
            $this->query("SELECT MAX(`id_semestres`) FROM `semestres`");
            
            $inset = [
                "id_semestres" => $this->first()['MAX(`id_semestres`)'],
                "id_alumno" => $_SESSION['id_user'],
                "ficha_matricula" => $matricula,
                "record_academico" => $record,
                "Fecha" => date('Y-m-d'),
                "estado_matricula"=>0,
                "comentario"=>"Creado"
            ];
            $this->table = 'matricula';
            $id = $this->create($inset);
            return true;
        }elseif($this->estado()=="actualizar"   ){
            $data = $this->get_();
            $fecha = date('Y-m-d');
            $this->query("UPDATE `matricula` SET `ficha_matricula`={$matricula},`record_academico`={$record},`Fecha`='{$fecha}',`comentario`='Actualizado' WHERE `id_semestres` = (SELECT MAX(id_semestres) FROM semestres) AND `id_alumno` = ".$_SESSION['id_user']);
            return true;
        }

    }

    public function aceptado($id)
    {
        $this->query("UPDATE `matricula` SET `estado_matricula`=1,`comentario`='Aceptado' WHERE `id_semestres` = (SELECT MAX(id_semestres) FROM semestres) AND `id_alumno` = ".$id);
    }
    public function revisar($idRole, $idUser, $cuerpo)
    {
        $comentarios = new \app\models\Comentarios();
        $idComentario = $comentarios->createComentario($idRole, $idUser, $cuerpo); 
    }

    public function rechazar($id)
    {
        $this->query("DELETE FROM `matricula` WHERE `id_semestres` = (SELECT MAX(id_semestres) FROM semestres) AND `id_alumno` = ".$id);   
    }

    public function get_($id=null){
        if(is_null($id)){
            $id = $_SESSION['id_user'];
        }
        $usuario = $this->query("SELECT * FROM matricula WHERE id_semestres = (SELECT MAX(id_semestres) FROM semestres) AND id_alumno = ".$id);
        $data = $this->first();
        return $data;  
    }

    public function get_documentos_ids($id = null)
    {
        $data = $this->get_($id);
        return [$data['ficha_matricula'],$data['record_academico']];
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

        $Ficha=$base->get_documento_direc($data['ficha_matricula']);
        $matricula=$base->get_documento_direc($data['record_academico']);
        return [$Ficha,$matricula];
    }

    public function delet_PDFs()
    {
        
        $base = new app\models\documentos();
        $matricula="NULL";
        $record="NULL";
        
        $data = $this->get_();
        $base = new app\models\documentos();
        $base->delete_file($data['ficha_matricula']);
        $base->delete_file($data['record_academico']);
        $this->query("UPDATE `matricula` SET `ficha_matricula`={$matricula},`record_academico`={$record} WHERE `id_semestres` = (SELECT MAX(id_semestres) FROM semestres) AND `id_alumno` = ".$_SESSION['id_user']);
        return true;
    }

    public function get_list(){
        $sql = "SELECT `comentario`,`Fecha`, matricula.id_alumno,persona.nombre, persona.apellido_paterno\n"
        . "FROM matricula\n"
        . "INNER JOIN alumno on alumno.id_alumno = matricula.id_alumno\n"
        . "INNER JOIN persona on alumno.id_persona = persona.id_persona\n"
        . "WHERE `estado_matricula`=0;";

        $this->query($sql);
        return  $this->get();
    }
}