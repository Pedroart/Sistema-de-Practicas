<?php

namespace app\controllers;
use core;
use app;

class home extends core\controller {
    public function index()
    {
        core\view::view_dashboard('home/index_admin',["titulo"=>"Inicio"]);
        return;     
    }
}
