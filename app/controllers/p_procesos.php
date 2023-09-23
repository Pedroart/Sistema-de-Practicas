<?php

namespace app\controllers;
use core;
use app;

class p_procesos extends core\controller {
    public function index()
    {
        $base = new app\models\proceso();
        $scrips =[
            "/plugins/datatables/jquery.dataTables.min.js",
            "/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
            "/plugins/datatables-responsive/js/dataTables.responsive.min.js",
            "/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
            "/plugins/datatables-buttons/js/dataTables.buttons.min.js",
            "/plugins/datatables-buttons/js/buttons.bootstrap4.min.js",
            "/plugins/jszip/jszip.min.js",
            "/plugins/pdfmake/pdfmake.min.js",
            "/plugins/pdfmake/vfs_fonts.js",
            "/plugins/datatables-buttons/js/buttons.html5.min.js",
            "/plugins/datatables-buttons/js/buttons.print.min.js",
            "/plugins/datatables-buttons/js/buttons.colVis.min.js"];
        core\view::view_dashboard("table_procesos",["titulo"=>"","data"=>$base->get_tabla()],$scrips);
        return;
    }
    public function estado($proceso){
        $base = new app\models\proceso();
        $data=$base->getProceso($proceso);
        //echo json_encode($data);
        if($data["procesos_tipo"]==1){
            core\view::view_dashboard("efectivas/estado",["titulo"=>"","data"=>$data,"formulario"=>$base->data_proceso($data,$data["procesos_tipo"],$data["proceso_etapa"])]);
        }elseif($data["procesos_tipo"]==1){
            return;
        }
        return;
    }

    public function edit($id){
        $base = new app\models\proceso();
        $data=$base->getProceso($id);
        
        //echo json_encode($data);
        core\view::view_dashboard("procesos/".$data["proceso_etapa"],["titulo"=>"","data"=>$data,"formulario"=>$base->data_proceso($data,$data["procesos_tipo"],$data["proceso_etapa"])]);
        return;
    }

    public function revisar($id){
        $comentarios = new \app\models\Comentarios();
        $idComentario = $comentarios->createComentario($_SESSION['role'], $_SESSION['id_user'], $_POST["comentario_principal"]);
        $controlador = new app\models\proceso;
        $controlador->actualizar_estado($id,["procesos_estado"=>4,"procesos_comentario"=>$idComentario]);
    }
}
