<?php

namespace app\controllers;
use core;
use app;

class p_validaciones extends core\controller {
    public function index()
    {
        $base = new app\models\matricula();
        
        core\view::view_dashboard("tabla_matriculados",["titulo"=>"","data"=>$base->get_list()]);
        return;
    }
    public function edit($id){
        $base = new app\models\matricula();
        core\view::view_dashboard("view_matricula",["titulo"=>"","id_documentos"=>$base->get_documentos_ids($id),"id"=>$id,"documentos"=>$base->get_documentes_comentarios($id)]);
        return;
    }

    public function revisar($id){
        
        $comentarios = new \app\models\Comentarios();
        $documentos = new \app\models\documentos();
        $cuerpo = $_POST['Ficha'];
        if (!($cuerpo == "")){
            $idComentario = $comentarios->createComentario($_SESSION['role'], $_SESSION['id_user'], $cuerpo);
            $documentos->agregar_comentario($_POST['idFicha'],$idComentario);
        }
        $cuerpo = $_POST['record'];
        if (!($cuerpo == "")){
            $idComentario = $comentarios->createComentario($_SESSION['role'], $_SESSION['id_user'], $cuerpo);
            $documentos->agregar_comentario($_POST['idrecord'],$idComentario);
        }
        return json_encode($_POST['idFicha']);
    }
}
