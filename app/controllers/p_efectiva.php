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
    public function proceso(){
        $id_proceso = 1;

        $model = new app\models\t_proceso();
        $etapas = $model -> get_etapas($id_proceso);

        core\view::view_dashboard('efectivas/etapas/9',["etapas"=>$etapas]);
        return;     
    }
    public function cartas()
    {
        core\view::view_dashboard('efectivas/cartas',[]);
        return;     
    }
}
