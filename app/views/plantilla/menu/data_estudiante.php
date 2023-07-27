<?php

use app\models;

$base = new app\models\matricula();

if( $base-> vericador() && $base-> estado() ){
        $menu = [
            "PRACTICAS PRE PROFECIONALES" => [
                [
                    'type' => "grupo-nav-link",
                    'icon' => "fas fa-fw fa-building",
                    'title'=> "Efectivas",
                    'sub'  => [
                        "Bienvenida"=>"/efectivas",
                        "Carta de Presentacion"=>"/efectivas/cartas",
                        "Proceso"=>"/efectivas/proceso",
                        "Estado"=>"/efectivas/estado",
                    ]
                ],
                [
                    'type' => "grupo-nav-link",
                    'icon' => "fas fa-fw fa-briefcase",
                    'title'=> "Desempeño laboral",
                    'sub'  => [
                        "Bienvenida"=>"/desempeno",
                        "Proceso"=>"/desempeno/proceso",
                        "Estado"=>"/desempeno/estado",
                    ]
                ],
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-angle-double-up",
                    'title'=> "Emprendimiento",
                    "url"  => "emprendimiento"
                ],
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-circle-notch",
                    'title'=> "Convalidacion",
                    "url"  => "convalidacion"
                ]
            ],
            "OTROS" => [
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-user-plus",
                    'title'=> "Practica extracurriculares",
                    "url"  => "extracurriculares"
                ],
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-user-graduate",
                    'title'=> "Practicas profecionales",
                    "url"  => "profecionales"
                ]
            ]
        ];
    }
    else{
        $menu = [
            "Matricula" => [
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-table",
                    'title'=> "Validacion",
                    "url"  => "validacion"
                ]
            ]
        ];
    }




