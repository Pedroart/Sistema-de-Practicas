<?php

namespace app\controllers;
use core;
use app;

class p_validaciones extends core\controller {
    public function index()
    {
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
        $base = new app\models\matricula();
        
        core\view::view_dashboard("tabla_matriculados",["titulo"=>"","data"=>$base->get_list()],$scrips);
        return;
    }
    public function edit($id){
        $base = new app\models\matricula();
        $model = new app\models\user();
        $id_persona =$model->Datos_Alumno($id);
        core\view::view_dashboard("view_matricula",["titulo"=>"","persona"=>$id_persona,"id_documentos"=>$base->get_documentos_ids($id),"id"=>$id,"documentos"=>$base->get_documentes_comentarios($id)]);
        return;
    }

    public function revisar($id){
        
        $comentarios = new \app\models\Comentarios();
        $documentos = new \app\models\documentos();
        $base = new app\models\matricula();
        $data = $base->get_documentes_comentarios($id);

        $base->query("UPDATE `matricula` SET `matricula_estado`=1 WHERE `matricula_id_semestre` = {$_SESSION['id_semestre']} AND `matricula_alumno` = ".$id);

        $cuerpo = $_POST['Ficha'];
        
        if (!($cuerpo == "") and ($data[0]["comentario"] == "")){
            $idComentario = $comentarios->createComentario($_SESSION['role'], $_SESSION['id_user'], $cuerpo);
            $documentos->agregar_comentario($_POST['idFicha'],$idComentario);
        }
        
        $cuerpo = $_POST['record'];
        if (!($cuerpo == "") and ($data[1]["comentario"] == "")){
            $idComentario = $comentarios->createComentario($_SESSION['role'], $_SESSION['id_user'], $cuerpo);
            $documentos->agregar_comentario($_POST['idrecord'],$idComentario);
        }
        
        
        return True;
    }
}
