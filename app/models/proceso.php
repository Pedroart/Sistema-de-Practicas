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
        $sql = "SELECT `id`,`id_estado` , alumno.id_alumno,persona.nombre,persona.apellido_paterno, empresa.Razon_socal_empresa, tprocesos.Inicio,tprocesos.nombre as e_nombre , tprocesos.Numero_Pasos, `id_etapa`\n"
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
        $retultado = [];
        $modelEmpresa = new app\models\empresa();
        $modelDocumento = new app\models\documentos();
        switch($etapa){
            case 7:
                $retultado["CentroLaboral"] = $modelEmpresa->get_empresa($data["id_empresa"]);
                $retultado["represente"] = $modelEmpresa->get_representante_empresa($data["id_empresa"]);
            case 8:
                $retultado["CentroLaboral"] = $modelEmpresa->get_empresa($data["id_empresa"]);
                $retultado["Carta"] = $modelEmpresa->get_empresaAlumno($retultado["CentroLaboral"][0]["id_empresa_alumno"]);
                $retultado["Documento"] = $modelDocumento->get_documento_direc($retultado["Carta"]["carta_aceptacion"]);
            case 9:
            case 10:
            case 11:
            case 12:
            default:
        }
        return $retultado;
    }

    public function siguienteProceso($id){
        $this->table = "tetapas_proceso";
        $this->where("id_etapa","=", $id);
        $data = $this->first();
        return $data;
    }
    
}
