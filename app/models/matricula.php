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
        if($this->_num_rows() == 0){
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
        return $data['estado_matricula'];
    }
    public function createe()
    {
        
        $base = new app\models\documentos();
        $matricula=$base-> create_files_post('ficha_matricula');
        $record=$base-> create_files_post('RecordAcademico');    
        if (!$this->vericador()){
            
            $this->query("SELECT MAX(`id_semestres`) FROM `semestres`");
            
            $inset = [
                "id_semestres" => $this->first()['MAX(`id_semestres`)'],
                "id_alumno" => $_SESSION['id_user'],
                "ficha_matricula" => $matricula,
                "record_academico" => $record
            ];
            $this->table = 'matricula';
            $id = $this->create($inset);
            return true;
        }else{
            $data = $this->get_();
            $base = new app\models\documentos();
            $base->delete_file($data['ficha_matricula']);
            $base->delete_file($data['record_academico']);
            $this->query("UPDATE `matricula` SET `ficha_matricula`={$matricula},`record_academico`={$record} WHERE `id_semestres` = (SELECT MAX(id_semestres) FROM semestres) AND `id_alumno` = ".$_SESSION['id_user']);
            return true;
        }

    }
    public function get_(){
        $usuario = $this->query("SELECT * FROM matricula WHERE id_semestres = (SELECT MAX(id_semestres) FROM semestres) AND id_alumno = ".$_SESSION['id_user']);
        $data = $this->first();
        return $data;  
    }
    public function destroy($id)
    {
        return 0;
    }
}