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

    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas', ["titulo" => " Hisotiral de Cartas"]);
    }

    public function estado()
    {
        core\view::view_dashboard('efectivas/estado', ["titulo" => " Estado"]);
        return;
    }

    public function proceso($id=null)
    {
        $proceso = new app\models\proceso();
        $dataProceso = $proceso->buscarProcesos($_SESSION['id_user']);

        if($proceso->_num_rows() ==0){ // Propone crear un proceso si no existe
            core\view::view_dashboard('conf_proceso',["titulo"=>"Efectivas","proceso"=>1]);
            return;
        }

        if(!($dataProceso["id_proceso"]==1)){
            $id = 0;
        }

        $this->proceso_id($id,$dataProceso);
        return;
    }

    private function proceso_id($id,$dataProceso){
        $id_actual = $dataProceso["id_etapa"];
        if(is_null($id)){
            $id = $id_actual;
        }
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model->get_etapas($id_proceso);
        if ($id <= $id_actual){
            $data = new app\models\data_efectivas();
            $dataProceso["id_Alumno"] = $_SESSION['id_user'];
            
            core\view::view_dashboard('efectivas/etapas/'.$id, ["titulo" => "", "etapas" => $etapas,"id_"=>$dataProceso["id"], "activo" => $id, "actual" => $id_actual,"dataProceso"=>&$dataProceso, "formulario"=> $data->data($id,(($id_actual>$id)? "3":$dataProceso["id_estado"]),$dataProceso)]);
            return;   
        }
        core\view::view_dashboard('efectivas/etapas/0', ["titulo" => "", "etapas" => $etapas, "activo" => $id, "actual" => $id_actual]);
        return;
    }

    public function update_proceso($id, $estado)
    {
        switch ($id) {
            case 7: $this->proceso_7($estado);break;
            case 8: $this->proceso_8($estado);break;
            case 9: $this->proceso_9($estado);break;
            case 10: $this->proceso_10($estado);break;
            case 11: $this->proceso_11($estado);break;
            default: break;
        }
    }
    private function proceso_11($estado){
        switch($estado){
            case 2:
            case 5:
                $base = new app\models\documentos();
                $FichaControl1 = $base->create_files_post('FichaControl1', "application/pdf");
                $base->crear_empresa_documento($FichaControl1, $_POST["id_empresaAlumno"], 2);
                $FichaControl2 = $base->create_files_post('FichaControl2', "application/pdf");
                $base->crear_empresa_documento($FichaControl1, $_POST["id_empresaAlumno"], 2);
                $FichaControl3 = $base->create_files_post('FichaControl3', "application/pdf");
                $base->crear_empresa_documento($FichaControl1, $_POST["id_empresaAlumno"], 2);
                $FichaControl4 = $base->create_files_post('FichaControl4', "application/pdf");
                $base->crear_empresa_documento($FichaControl1, $_POST["id_empresaAlumno"], 2);
                break;
            default:
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
            "DNI" =>$_POST["DNI"] ,
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
            "direccion" =>      $_POST["direccion"],
            "correo" =>         $_POST["correo"],
            "celular" =>        $_POST["celular"],
            "departamento" =>   $_POST["departamento"],
            "provincia" =>      $_POST["provincia"],
            "distrito" =>       $_POST["distrito"],
        ];
        $Data_Empresa = [
            "RUC" =>                            $_POST["empresa_RUC"],
            "Razon_socal_empresa" =>            $_POST["empresa_NombreEmpres"],
            "Referencia_ubicacion_empresa" =>   $_POST["empresa_DirecLabo"],
            "id_distrito" =>                    $_POST["empresa_Distrito2"],
        ];
        $Data_Representante = [
            "nombre" =>             $_POST["representante_Name"],
            "apellido_p" =>         $_POST["representante_Aparternor"],
            "apellido_m" =>         $_POST["representante_Amarterno"],
            "cargo" =>              $_POST["Cargo"],
            "Genero" =>             $_POST["Genero"],
            "GradoInstruccion" =>   $_POST["representante_GradoInstruccion"],
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
