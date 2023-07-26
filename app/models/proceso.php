<?php

namespace app\models;

use core;
use app;

class proceso extends core\modelo
{
    public function buscarProcesos($id_alumno)
    {
        $sql = "SELECT * FROM `procesos` WHERE `procesos_alumno` = {$id_alumno} and `procesos_semestre` = {$_SESSION['id_semestre']}";
        $this->query($sql);
        return $this->first();
    }

    public function getProceso($id) {
        $this->table = "procesos";
        $this->where("procesos_id","=", $id);
        return $this->first();
    }

    public function creata($id)
    {
        $model = new app\models\t_proceso();
        $etapa = $model->get_etapas($id);
        $sql = "INSERT INTO `procesos` (`procesos_semestre`, `procesos_tipo`, `procesos_alumno`, `proceso_etapa`,`procesos_estado`) VALUES ({$_SESSION['id_semestre']}," . $id . ", '". $_SESSION['id_user'] ."'," . $etapa[0]['tetp_id_etapa'] . ",1)";

        $this->query($sql);
        echo json_encode(["resultado" => true]);
    }

    public function get_tabla()
    {
        $sql = "SELECT * FROM `procesos`\n"

    . "LEFT JOIN alumnos on alumnos.alumno_codigo = procesos_alumno\n"

    . "LEFT JOIN personas on personas.persona_id = alumnos.user_persona_id\n"

    . "LEFT JOIN escuelas on escuelas.escuela_id = alumnos.alumnos_escuela\n"

    . "LEFT JOIN tetapas_proceso on tetapas_proceso.tetp_id_etapa = procesos.proceso_etapa\n"

    . "LEFT JOIN testados_proceso on testados_proceso.tep_id_estado = procesos.procesos_estado\n"

    . "LEFT JOIN tprocesos on tprocesos.tp_id_tprocesos = procesos.procesos_tipo\n"

        . "WHERE procesos_semestre = {$_SESSION['id_semestre']};";
        $this->query($sql);
        $data = $this->get();

        return $data;

    }

    public function actualizar_estado($id,$data){
        $this->table ="procesos";
        $this->update4key($id,$data,"procesos_id");
    }

    public function data_proceso($data,$proceso,$etapa){
        
        switch($proceso){
            case 1:
                
                return $this->data_efectivas($data,$etapa);
                
            case 2:
                break;
            default:
            break;
        }
    }

    public function data_efectivas($data,$etapa) {
        $dataefectiva = new app\models\data_efectivas();
        return $dataefectiva ->data($etapa,2,$data);
        
    }

    public function siguienteProceso($id){
        $this->table = "tetapas_proceso";
        $this->where("id_etapa","=", $id);
        $data = $this->first();
        return $data;
    }
    
}
