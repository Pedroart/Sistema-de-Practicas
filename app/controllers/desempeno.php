<?php
namespace app\controllers;

use core;

class desempeno extends core\controller{
    static public function display(){
        view_dashboard('/dempleño',[]);
    }
}