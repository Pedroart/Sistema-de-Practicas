<?php

function view($route, $data = []){

    extract($data);
    if ( file_exists(_view_."/{$route}.php") ){
        
        include _view_."/{$route}.php";
                
    }
    else {
        echo  "noexiste";
    }
}

function view_dashboard($route, $data = []){

    extract($data);
    if ( file_exists(_view_."/{$route}.php") ){
        
        ob_start();
        include _view_."/{$route}.php";
        $contenido = ob_get_clean();
        
        include _view_."/plantilla.php";
        
    }
    else {
        echo  "noexiste";
    }
}