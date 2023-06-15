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
    
    public function parametros(&$array,$id,$id_proceso){
        $modeloEmpresa = new app\models\empresa();
        switch ($id) {
            case 7:
                # code...
                break;
            case 8:
            case 9:
            case 10:    
                $dataEmpresa = $modeloEmpresa->get_name_empresa($id_proceso);
                $array["empresa_nombre"] = $dataEmpresa["Razon_socal_empresa"];
                $array["id_empresaAlumno"] = $dataEmpresa["id_empresa_alumno"];
                $array["id_empresa"] = $dataEmpresa["id_empresa"];
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
            $this->parametros($datacall,$id,$id_main_proceso);
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
            case 7: $this->proceso_7($estado);break;
            case 8: $this->proceso_8($estado);break;
            case 9: $this->proceso_9($estado);break;
            case 9: $this->proceso_10($estado);break;
            default: break;
        }
    }
    private function proceso_10($estado){
        switch($estado){
            case 2:
            case 5:
                $base = new app\models\documentos();
                $Actividades=$base-> create_files_post('Plan_Actividades',"application/pdf");
                $base->crear_empresa_documento($Actividades,$_POST["id_empresaAlumno"],1);
                break;
            default:
        }
    }

    private function proceso_9($estado){
        $Data_Representante = [
            "id_empresa" => $_POST["id_empresa"],
            "id_puesto"=> 2,
            "DNI" =>$_POST["dni"] ,
            "correo" =>$_POST["correo"] ,
            "numero" =>$_POST["numero"] ,
            "Genero" =>$_POST["Genero"] ,
            "nombre" =>$_POST["nombre"] ,
            "apellido_p" =>$_POST["apellido_p"] ,
            "apellido_m" =>$_POST["apellido_m"] ,
            "GradoInstruccion" =>$_POST["GradoInstruccion"] ,
            "cargo" =>$_POST["cargo"] ,
        ];
        switch ($estado) {
            case 2:
            case 5:
                $model = new app\models\empresa();                
                $id_jefe = $model->crear_representante_empresa($Data_Representante);
                $model->update_empres_alumno($_POST["id_empresaAlumno"],["id_jefe_inmediato"=>$id_jefe]);

                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["id_estado"=>2]);
                break;
            
            default:
                break;
        }
    }

    private function proceso_8($estado){
        $Data_Aceptacion = [
            "fecha_inicio"=>date("Y-m-d", strtotime($_POST["fecha_inicio"])),
            "fecha_fin"=>date("Y-m-d", strtotime($_POST["fecha_fin"])),
        ];

        switch($estado){
            case 2:
            case 5:
                $base = new app\models\documentos();
                $matricula=$base-> create_files_post('carta_presentacion',"application/pdf");
                $Data_Aceptacion["carta_aceptacion"]=$matricula;
                $model = new app\models\empresa();
                $model->update_empres_alumno($_POST["id_empresa_alumno"],$Data_Aceptacion);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["id_estado"=>2]);
                break;
            default:
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
            case 2:
            case 5:
                $model = new app\models\empresa();
                $id_Empresa=$model->crear($Data_Empresa);
                $Data_Empresa_Alumno["id_empresa"] = $id_Empresa;
                $Data_Representante["id_empresa"] = $id_Empresa;
                $Data_Representante["id_puesto"]= 1;
                
                $id_represe_empresa = $model->crear_representante_empresa($Data_Representante);
                $Data_Empresa_Alumno["id_representante"]=$id_represe_empresa;
                $empresa_Alumno=$model->crear_empresa_alumno($Data_Empresa_Alumno);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["id_estado"=>2,"id_empresa"=>$empresa_Alumno]);
                break;
            
            default:
                # code...
                break;
        }
    }
}
