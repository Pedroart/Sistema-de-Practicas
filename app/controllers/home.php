<?php
namespace app\controllers;

include _core_."/view.php";


use core;

class home extends core\controller{
    static public function display(){
        view_dashboard('index',[]);
    }
}