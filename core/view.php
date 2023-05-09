<?php

namespace core;

class view{
    
    public static function view_($route, $data = []){
        
        extract($data);
        if ( file_exists(_view_."/{$route}.php") ){
            
            include _view_."/{$route}.php";
                    
        }
        else {
            echo  "noexiste";
        }
        return;
    }

    public static function view_dashboard($route, $data = []){

        extract($data);
        if ( file_exists(_view_."/{$route}.php") ){
            
            ob_start();
            include _view_."/{$route}.php";
            $contenido = ob_get_clean();
            
            ob_start();
            include _view_."/plantilla/menu/constructor.php";
            $menu = ob_get_clean();

            include _view_."/plantilla/plantilla.php";
            
        }
        else {
            echo  _view_."/{$route}.php";
        }
        return;
    }
}