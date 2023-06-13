<?php

namespace app\models;

use core;
use app;

class proceso extends core\modelo
{
    public function buscarProcesos($id_alumno)
    {
        $sql = "SELECT `id`,`id_proceso`,`id_etapa`,`id_estado` FROM `proceso` WHERE `id_alumno` = {$id_alumno} and `id_semestre` = (SELECT MAX(`id_semestres`)FROM `semestres`)";
        $this->query($sql);
        return $this->first();
    }

    public function getProceso($id) {
        $this->table = "proceso";
        $this->where("id","=", $id);
        return $this->first();
    }

    public function creata($id)
    {
        $model = new app\models\t_proceso();
        $etapa = $model->get_etapas($id);
        $sql = "INSERT INTO `proceso` (`id_semestre`, `id_proceso`, `id_alumno`, `id_etapa`) VALUES ((SELECT MAX(`id_semestres`)FROM `semestres`)," . $id . "," . $_SESSION['id_user'] . "," . $etapa[0]['id_etapa'] . ")";
        $this->query($sql);
        echo json_encode(["resultado" => true]);
    }

    public function get_tabla()
    {
        $sql = "SELECT `id`, alumno.id_alumno,persona.nombre,persona.apellido_paterno, empresa.Razon_socal_empresa, tprocesos.Inicio, tprocesos.Numero_Pasos, `id_etapa`\n"
            . "FROM `proceso`\n"
            . "INNER JOIN alumno on proceso.id_alumno = alumno.id_alumno\n"
            . "INNER JOIN persona on persona.id_persona = alumno.id_persona\n"
            . "LEFT JOIN empresa on empresa.id_empresa = proceso.id_empresa\n"
            . "INNER JOIN tprocesos on tprocesos.id_tprocesos = proceso.id_proceso\n"
            . "WHERE proceso.id_semestre = (SELECT MAX(id_semestres) FROM semestres);";
        $this->query($sql);
        $data = $this->get();

        return $data;

    }

    public function actualizar_estado($id,$data){
        $this->table ="proceso";
        $this->update4key($id,$data,"id");
    }
}
