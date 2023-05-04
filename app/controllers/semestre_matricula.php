<?php
namespace app\controllers;

use core;

class semestre_matricula extends core\controller{
    
    static public function display(){
        view_dashboard('/semestre_matricula/semestre_matricula',[]);
    }
    static public function verificar()
    {
        header('Content-Type: application/json');
        if(is_null($_POST)){
            
            echo json_encode(["resultado" => "datosNoIngresados"]);
            return;
        }

        $semestre = $_POST['semestre'];

        // Recibir el archivo enviado en el campo 'ficha_matricula'
        $ficha_matricula = $_FILES['ficha_matricula'];
        $nombre_ficha_matricula = $ficha_matricula['name'];
        $tipo_ficha_matricula = $ficha_matricula['type'];
        $tamaño_ficha_matricula = $ficha_matricula['size'];
        $ruta_temporal_ficha_matricula = $ficha_matricula['tmp_name'];
        // Recibir el archivo enviado en el campo 'RecordAcademico'
        $record_academico = $_FILES['RecordAcademico'];
        $nombre_record_academico = $record_academico['name'];
        $tipo_record_academico = $record_academico['type'];
        $tamaño_record_academico = $record_academico['size'];
        $ruta_temporal_record_academico = $record_academico['tmp_name'];

        
        // Mover el archivo a una ubicación permanente
        move_uploaded_file($ruta_temporal_ficha_matricula,__DIREC__.'/public/uploads/' . $nombre_ficha_matricula);
        // Mover el archivo a una ubicación permanente
        move_uploaded_file($ruta_temporal_record_academico, __DIREC__.'/public/uploads/' . $nombre_record_academico);

        $base = new \app\models\matricula;
        $id1=$base-> subirSolicitud($nombre_ficha_matricula);
        $id2=$base-> subirSolicitud($nombre_record_academico);
        $resultado=$base->subirDatasemetres($semestre,$id1, $id2);
        echo json_encode(["resultado" => True]);
        return;

        
    }
}