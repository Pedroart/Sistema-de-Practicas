<?php

namespace app\models;
use core;

class comentarios extends core\modelo{
    public function createComentario($idRole, $idUser, $cuerpo){
        $insert = [
            "comentario_role" => $idRole,
            "comentario_user" => $idUser,
            "comentario_cuerpo" => $cuerpo,
            "comentario_fecha" => date('Y-m-d')
        ];
        
        $this->table = 'comentarios';
        $id = $this->create($insert);
        
        return $id;
    }
}