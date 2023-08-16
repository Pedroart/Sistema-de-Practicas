<?php

namespace core;

/*

    Clase controladora de la vista, permitiendo construir las pagina en 2 modos
    1. Full Pantalla
    2. Plantilla Dashboard
*/

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

    public static function view_dashboard($route, $data = [],$scrips=null){

        extract($data);
        if ( file_exists(_view_."/{$route}.php") ){
            
            ob_start();
            include _view_."/{$route}.php";
            $contenido = ob_get_clean();
            
            ob_start();
            include _view_."/plantilla/menu/constructor.php";
            $menu = ob_get_clean();
            
            $scripstes="";
            if(is_array($scrips)){
                foreach($scrips as $links){
                    $scripstes.="<script src="._URL_."".$links."></script>";
                }
            }
            include _view_."/plantilla/plantilla.php";
            
        }
        else {
            echo  _view_."/{$route}.php";
        }
        return;
    }
}