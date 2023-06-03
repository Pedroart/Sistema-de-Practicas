<?php

namespace app\models;
use core;
use app;
class proceso extends core\modelo{
    public function buscarProcesos($id_alumno)
    {
        $sql = "SELECT `id`,`id_proceso`,`id_etapa` FROM `proceso` WHERE `id_alumno` = {$id_alumno} and `id_semestre` = (SELECT MAX(`id_semestres`)FROM `semestres`)";
        $this->query($sql);
        return $this->first();
    }

    public function creata($id){
        $model = new app\models\t_proceso();
        $etapa = $model -> get_etapas($id);
        $sql = "INSERT INTO `proceso` (`id_semestre`, `id_proceso`, `id_alumno`, `id_etapa`) VALUES ((SELECT MAX(`id_semestres`)FROM `semestres`),".$id.",".$_SESSION['id_user'].",".$etapa[0]['id_etapa'].")";
        $this->query($sql);
        echo json_encode(["resultado"=>true]) ;
    } 

}