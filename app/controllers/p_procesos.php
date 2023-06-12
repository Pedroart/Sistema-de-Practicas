<?php

namespace app\controllers;
use core;
use app;

class p_procesos extends core\controller {
    public function index()
    {
        $base = new app\models\proceso();
        
        core\view::view_dashboard("table_procesos",["titulo"=>"","data"=>$base->get_tabla()]);
        return;
    }
}
