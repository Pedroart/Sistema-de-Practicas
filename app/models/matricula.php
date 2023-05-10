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
        if (! $this->vericador()){
            $base = new app\models\documentos();
            $matricula=$base-> create_files_post('ficha_matricula');
            $record=$base-> create_files_post('RecordAcademico');
            
            $inset = [
                "id_semestres" => $this->ultimosemestre(),
                "id_alumno" => $_SESSION['id_user'],
                "ficha_matricula" => $matricula,
                "record_academico" => $record
            ];
            $this->table = 'matricula';
            $id = $this->create($inset);
            return $id;
        }else{
            
        }

        
    }
    public function destroy($id)
    {
        return 0;
    }
}