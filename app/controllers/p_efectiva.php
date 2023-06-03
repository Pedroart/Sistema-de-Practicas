<?php

namespace app\controllers;
use core;
use app;

class p_efectiva extends core\controller {
    public function index()
    {
        core\view::view_dashboard('efectivas/index',[]);
        return;     
    }

    public function pre_proceso($id_alumno){
        $model = new app\models\proceso();
        $data = $model -> buscarProcesos($id_alumno);
        if($model ->_num_rows() == 0){
            return false;
        }
        return $data;
    }

    public function proceso($id_etapa_actual){
        $id_proceso = 1;

        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);

        core\view::view_dashboard('efectivas/etapas/'.$id_etapa_actual,["etapas"=>$etapas,"activo"=>$id_etapa_actual,"actual"=>$id_etapa_actual]);
        return;     
    }

    public function proceso_id($id,$actual){
        $id_proceso = 1;
        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);
        if($id<=$actual)
        {
        core\view::view_dashboard('efectivas/etapas/'.$id,["etapas"=>$etapas,"activo"=>$id,"actual"=>$actual]);
        return;
        }
        core\view::view_dashboard('efectivas/etapas/0',["etapas"=>$etapas,"activo"=>$id,"actual"=>$actual]);
    }
    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas',[]);
        return;     
    }

    public function estado()
    {
        core\view::view_dashboard('efectivas/estado',[]);
        return;     
    }
}
