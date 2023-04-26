<?php
namespace app\controllers;

include _core_."/view.php";

use core;

class user extends core\controller{
    
    public function indexlogin()
    {
        
        view("login",[]);
    }

}