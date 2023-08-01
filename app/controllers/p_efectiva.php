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
        $proceso = new app\models\proceso();
        $dataProceso = $proceso->buscarProcesos($_SESSION['id_user']);
        $estado = false;
        $dataEmpresa = [];
        if($proceso->_num_rows() !=0){
            
            $empresa = new app\models\empresa();
            $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
            if(!is_null($aux)){
                $dataEmpresa = $empresa->get_empresa_datos($aux["empresa_datos"]);
                if($dataProceso["proceso_etapa"] > 1) {$estado = true;}
                elseif($dataProceso["procesos_estado"] == 3) {$estado = true;}
            }

            
        }



        core\view::view_dashboard('efectivas/cartas', ["titulo" => "Carta de Presentacion","dataProceso"=>$dataProceso,"estado"=>$estado,"data_empresa"=>$dataEmpresa]);
    }
    public function cartas_descarga($id){
        $proceso = new app\models\proceso();
        $dataProceso = $proceso->buscarProcesos($_SESSION['id_user']);
        $estado = false;
        $dataEmpresa = [];
        if($proceso->_num_rows() !=0){
            
            $empresa = new app\models\empresa();
            $aux = $empresa->get_empresaAlumno($dataProceso["procesos_id"]);
            if(!is_null($aux)){
                $dataEmpresa = $empresa->get_empresa_datos($aux["empresa_datos"]);
                $estado = true;
            }
        }
        core\view::view_('efectivas/carta_descarga', ["titulo" => "Carta de Presentacion","dataProceso"=>$dataProceso,"estado"=>$estado,"data_empresa"=>$dataEmpresa]);
    }

    public function estado()
    {
        
        $proceso = new app\models\proceso();
        $dataProceso = $proceso->buscarProcesos($_SESSION['id_user']);
        $data = new app\models\data_efectivas();
        
        core\view::view_dashboard('efectivas/estado', ["titulo" => " Estado","formulario"=>$data->data_all($dataProceso)]);
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

        if(!($dataProceso["procesos_tipo"]==1)){
            $id = 0;
        }

        $this->proceso_id($id,$dataProceso);
        return;
    }

    private function proceso_id($id,$dataProceso){
        $id_actual = $dataProceso["proceso_etapa"];
        if(is_null($id)){
            $id = $id_actual;
        }
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model->get_etapas($id_proceso);
        if ($id <= $id_actual){
            $data = new app\models\data_efectivas();
            $dataProceso["id_Alumno"] = $_SESSION['id_user'];
            
            core\view::view_dashboard('efectivas/etapas/'.$id, ["titulo" => "", "etapas" => $etapas,"id_"=>$dataProceso["procesos_id"], "activo" => $id, "actual" => $id_actual,"dataProceso"=>&$dataProceso, "formulario"=> $data->data($id,(($id_actual>$id)? "3":$dataProceso["procesos_estado"]),$dataProceso)]);
            return;   
        }
        core\view::view_dashboard('efectivas/etapas/0', ["titulo" => "", "etapas" => $etapas, "activo" => $id, "actual" => $id_actual]);
        return;
    }

    public function update_proceso($id, $estado)
    {
        switch ($id) {
            case 1: $this->proceso_1($estado);break;
            case 2: $this->proceso_2($estado);break;
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

    private function proceso_2($estado){
        $Data_Aceptacion = [
            "empresa_fecha_inicio"=>date("Y-m-d", strtotime($_POST["fecha_inicio"])),
            "empresa_fecha_fin"=>date("Y-m-d", strtotime($_POST["fecha_fin"])),
        ];

        switch($estado){
            case 1:
                error_log("2");
                $base = new app\models\documentos();
                $carta_presenta=$base-> create_files_post('carta_aceptacion',"application/pdf");
                

                $model = new app\models\empresa();
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>3,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$carta_presenta]);
                error_log(  json_encode( $model->get_empresaAlumno( $_POST["id_proceso"] ) ) );
                $model->update_empres_alumno( $model->get_empresaAlumno($_POST["id_proceso"]) ["empresa_proceso_id"] , $Data_Aceptacion );
                
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
            default:
        }
        return;
    }

    private function proceso_1($estado)
    {
        if(isset($_POST["distrito"])){
            $Data_Estudiante = [
                "persona_direccion" =>      $_POST["direccion"],
                "persona_correo" =>         $_POST["correo"],
                "persona_celular" =>        $_POST["celular"],
                "persona_ubi" =>       $_POST["distrito"],
            ];
            $Data_Empresa = [
                "empresa_RUC" =>                            $_POST["RUC"],
                "empresa_razon_social" =>            $_POST["Razon_socal_empresa"],
                "empresa_direcion" =>   $_POST["Referencia_ubicacion_empresa"],
                "empresa_ubi" =>                    $_POST["id_distrito"],
            ];
            $Data_Representante = [
                "encargado_nombres" =>             $_POST["nombre"],
                "encargado_papellido" =>         $_POST["apellido_p"],
                "encargado_mapellido" =>         $_POST["apellido_m"],
                "encargado_cargo" =>              $_POST["cargo"],
                "encargado_genero" =>             $_POST["Genero"],
                "encargado_grado_instruccion" =>   $_POST["GradoInstruccion"],
            ];
            $Data_Empresa_Alumno=[
                "empresa_alumno"=>$_SESSION['id_user'],
                "empresa_proceso"=>$_POST["id_proceso"],
            ];
            $model = new app\models\user();
            $id_persona =$model->buscar_id_persona_estudiante($_SESSION['id_user']);

            $model->actualizar_DatosSecundarios_Alumno($id_persona["user_persona_id"],$Data_Estudiante);
        }
        
        
        
        switch ($estado) {
            case 1:
                $model = new app\models\empresa();
                $id_Empresa=$model->crear_data($Data_Empresa);
                $Data_Empresa_Alumno["empresa_datos"] = $id_Empresa;
                $empresa_Alumno=$model->crear_empresa_alumno($Data_Empresa_Alumno);
                
                $Data_Representante["encargado_puesto"]= 4;
                $Data_Representante["encargado_empresa"]= $empresa_Alumno;
                $id_represe_empresa = $model->crear_representante_empresa($Data_Representante);
                
                $model->actualizar_estado($empresa_Alumno,["empresa_representante"=>$id_represe_empresa]);
                
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
            default:
                $model = new app\models\empresa();
                $model->cadenaBorrado1($_POST["id_proceso"]);
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1,"procesos_comentario"=>"NULL"]);
            
                # code...
                break;
        }
        return true;
    }
    
}
