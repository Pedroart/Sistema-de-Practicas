<?php

namespace app\controllers;
use core;
use app;

class vali_matri extends core\controller{
    public function index()
    {
        core\view::view_dashboard('semestre_matricula',[]);
        return;     
    }
}