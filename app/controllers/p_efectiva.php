<?php

namespace app\controllers;

use core;
use app;

class p_efectiva extends core\controller
{
    public function index()
    {
        if (!$this->matricula()) {
            $a = new app\controllers\vali_matri();
            $a->index();
        }

        core\view::view_dashboard('efectivas/index', ["titulo" => "Practicas Efectivas"]);
        return;
    }

    public function pre_proceso($id_alumno)
    {
        $model = new app\models\proceso();
        $data = $model->buscarProcesos($id_alumno);
        if ($model->_num_rows() == 0) {
            return false;
        }
        return $data;
    }
    
    public function parametros(&$array,$id){
        switch ($id) {
            case 7:
                # code...
                break;
            case 8:
                $array["id_empresa"] = 1;
                $array["empresa_nombre"] = "Empresa - Ejemplo";
                    break;
            default:
                # code...
                break;
        }
    }

    public function proceso($id,$id_etapa_actual, $estado)
    {
        
        $this->proceso_id($id_etapa_actual, $id_etapa_actual,$id,$estado);
        return;
    }

    public function proceso_id($id, $actual,$id_main_proceso,$estado_main_proceso)
    {
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model->get_etapas($id_proceso);
        if ($id <= $actual) {
            $datacall = ["titulo" => "","id_"=>$id_main_proceso, "etapas" => $etapas, "activo" => $id, "actual" => $actual,"estado"=>3];
            $this->parametros($datacall,$id);
            if($id == $actual){
                $datacall["estado"]=$estado_main_proceso;
            }
            core\view::view_dashboard('efectivas/etapas/' . $id, $datacall);
            return;
        }
        core\view::view_dashboard('efectivas/etapas/0', ["titulo" => "", "etapas" => $etapas, "activo" => $id, "actual" => $actual]);
    }
    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas', ["titulo" => " Hisotiral de Cartas"]);
    }

    public function estado()
    {
        core\view::view_dashboard('efectivas/estado', ["titulo" => " Estado"]);
        return;
    }
    public function update_proceso($id, $estado)
    {
        switch ($id) {
            case 7:
                $this->proceso_7($estado);
                break;

            default:
                # code...
                break;
        }
    }

    private function proceso_7($estado)
    {
        $Data_Estudiante = [
            "direccion" => $_POST["estudiante_Direc"],
            "correo" => $_POST["estudiante_Correo"],
            "celular" => $_POST["estudiante_Celular"],
            "departamento" => $_POST["estudiante_Departamento"],
            "provincia" => $_POST["estudiante_Provincia"],
            "distrito" => $_POST["estudiante_Distrito"]
        ];
        $Data_Empresa = [
            "RUC" => $_POST["empresa_RUC"],
            "Razon_socal_empresa" => $_POST["empresa_NombreEmpres"],
            "Referencia_ubicacion_empresa" => $_POST["empresa_DirecLabo"],
            "id_distrito" => $_POST["empresa_Distrito2"],
        ];
        $Data_Representante = [
            "nombre" => $_POST["representante_Name"],
            "apellido_p" => $_POST["representante_Aparternor"],
            "apellido_m" => $_POST["representante_Amarterno"],
            "cargo" => $_POST["Cargo"],
            "Genero" => $_POST["Genero"],
            "GradoInstruccion" => $_POST["representante_GradoInstruccion"],
        ];
        $Data_Empresa_Alumno=[
            "id_alumno"=>$_SESSION['id_user']
        ];
        
        $model = new app\models\user();
        $id_persona =$model->buscar_id_persona_estudiante($_SESSION['id_user']);
        $model->actualizar_DatosSecundarios_Alumno($id_persona["id_persona"],$Data_Estudiante);
        
        switch ($estado) {
            case 5:
                $model = new app\models\empresa();
                $id_Empresa=$model->crear($Data_Empresa);
                $Data_Empresa_Alumno["id_empresa"] = $id_Empresa;
                $Data_Representante["id_empresa"] = $id_Empresa;
                $Data_Representante["id_puesto"]= 1;
                
                $id_represe_empresa = $model->crear_representante_empresa($Data_Representante);
                $Data_Empresa_Alumno["id_representante"]=$id_represe_empresa;
                $model->crear_empresa_alumno($Data_Empresa_Alumno);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["id_estado"=>2]);
                break;
            default:
                # code...
                break;
        }
    }
}
