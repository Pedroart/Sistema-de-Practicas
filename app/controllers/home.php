<?php

namespace app\controllers;
use core;
use app;

class home extends core\controller {
    public function index()
    {
        $uri_view = "";
        if ($_SESSION['role'] == "1") {
            $uri_view = "home/index_admin";
        } elseif ($_SESSION['role'] == "2") {
            $uri_view = "home/index_docente";
        } elseif ($_SESSION['role'] == "3") {
            $uri_view = "home/index_estudiante";
        }
        core\view::view_dashboard($uri_view,["titulo"=>""]);
        return;     
    }
}
