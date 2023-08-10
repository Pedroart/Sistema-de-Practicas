<?php

namespace app\controllers;

use core;
use app;
use Error;

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
        error_log(json_encode($dataProceso));
        $data = new app\models\data_efectivas();
        
        core\view::view_dashboard('efectivas/estado', ["titulo" => "Estado","formulario"=>$data->data_all($dataProceso),"estado"=>3]);
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
            case 3: $this->proceso_3($estado);break;
            case 4: $this->proceso_4($estado);break;
            case 5: $this->proceso_5($estado);break;
            case 6: $this->proceso_6($estado);break;
            default: break;
        }
    }
    private function proceso_6($estado){
        switch($estado){
            case 1:
                $base = new app\models\documentos();
                $Control1 =$base-> create_files_post('Informe_Final',"application/pdf");
                $Control2 =$base-> create_files_post('Constancia_Practicas',"application/pdf");
                $model = new app\models\empresa();
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>5,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control1]);
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>6,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control2]);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
                default:
                        $model = new app\models\empresa();
                        $model->deleteEmpresaDocumento($_POST["id_proceso"],5);
                        $model->deleteEmpresaDocumento($_POST["id_proceso"],6);
                        $model = new app\models\proceso();
                        $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1]);
                
            break;
        }
        return true;
    }
    private function proceso_5($estado){
        switch($estado){
            case 1:
                $base = new app\models\documentos();
                $Control1 =$base-> create_files_post('FichaControl1',"application/pdf");
                $Control2 =$base-> create_files_post('FichaControl2',"application/pdf");
                $Control3 =$base-> create_files_post('FichaControl3',"application/pdf");
                $Control4 =$base-> create_files_post('FichaControl4',"application/pdf");
                $model = new app\models\empresa();
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>2,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control1]);
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>2,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control2]);
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>2,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control3]);
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>2,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Control4]);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
                default:
                        $model = new app\models\empresa();
                        $model->deleteEmpresaDocumentos($_POST["id_proceso"],2);
                        $model = new app\models\proceso();
                        $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1]);
                
            break;
        }
        return true;
    }
    private function proceso_4($estado){
        switch($estado){
            case 1:
                
                $base = new app\models\documentos();
                $Actividades =$base-> create_files_post('Plan_Actividades',"application/pdf");
                

                $model = new app\models\empresa();
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>1,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$Actividades]);
                
                
                
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
            default:
                $model = new app\models\empresa();
                $model->deleteEmpresaDocumento($_POST["id_proceso"],1);
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1]);
        }
        return true;
    }

    private function proceso_3($estado){
        if($estado<2){
            $Data_Representante = [
            "encargado_dni"=>$_POST["encargado_dni"],
            "encargado_genero"=>$_POST["encargado_genero"],
            "encargado_nombres"=>$_POST["encargado_nombres"],
            "encargado_papellido"=>$_POST["encargado_papellido"],
            "encargado_mapellido"=>$_POST["encargado_mapellido"],
            "encargado_grado_instruccion"=>$_POST["encargado_grado_instruccion"],
            "encargado_cargo"=>$_POST["encargado_cargo"],
            "encargado_correo"=>$_POST["encargado_correo"],
            "encargado_celular"=>$_POST["encargado_celular"],
        ];
        }
        
        switch ($estado) {
            case 1:
                $model = new app\models\empresa();
                
                $empresa_Alumno= $model->get_empresaAlumno($_POST["id_proceso"])["empresa_proceso_id"] ;
                
                
                $Data_Representante["encargado_puesto"]= 5;
                $Data_Representante["encargado_empresa"]= $empresa_Alumno;
                $id_represe_empresa = $model->crear_representante_empresa($Data_Representante);
                error_log(  json_encode( $id_represe_empresa )  );
                $model->update_empres_alumno($empresa_Alumno , ["empresa_jefe_inmediato"=>$id_represe_empresa] );
                
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
            default:
                $model = new app\models\empresa();
                    
                $empresa_Alumno= $model->get_empresaAlumno($_POST["id_proceso"]);
                
                $model->table="empresa_encargado";
                $model->delete($empresa_Alumno["empresa_jefe_inmediato"],"encargado_id");
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1]);
                
                # code...
                break;
        }
        return true;
    }

    private function proceso_2($estado){
        $Data_Aceptacion = [
            "empresa_fecha_inicio"=>date("Y-m-d", strtotime($_POST["fecha_inicio"])),
            "empresa_fecha_fin"=>date("Y-m-d", strtotime($_POST["fecha_fin"])),
        ];

        switch($estado){
            case 1:
                
                $base = new app\models\documentos();
                $carta_presenta=$base-> create_files_post('carta_aceptacion',"application/pdf");
                

                $model = new app\models\empresa();
                $model->sabeDocumentoEmpresa(["empresa_documento_tipo"=>3,"empresa_documento_proceso"=>$_POST["id_proceso"],"empresa_documento"=>$carta_presenta]);
                
                $model->update_empres_alumno( $model->get_empresaAlumno($_POST["id_proceso"]) ["empresa_proceso_id"] , $Data_Aceptacion );
                
                $model = new app\models\proceso();
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>2]);
                break;
            case 2:
                $model = new app\models\empresa();
                $model->deleteEmpresaDocumento($_POST["id_proceso"],3);
                $model->actualizar_estado($_POST["id_proceso"],["procesos_estado"=>1]);
            default:
        }
        return true;
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
