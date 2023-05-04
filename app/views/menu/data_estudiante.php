<?php

$base = new \app\models\matricula;
    if( $base-> estaMatriculado()){
        $menu = [
            "PRACTICAS PRE PROFECIONALES" => [
                [
                    'type' => "grupo-nav-link",
                    'icon' => "fas fa-fw fa-building",
                    'title'=> "Efectivas",
                    'sub'  => [
                        "Bienvenida"=>"/efectivas",
                        "Historial de cartas"=>"/efectivas/cartas",
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
                    "url"  => "/nav_iten_1"
                ],
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-circle-notch",
                    'title'=> "Convalidacion",
                    "url"  => "/nav_iten_1"
                ]
            ],
            "OTROS" => [
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-user-plus",
                    'title'=> "Practicas extracurriculares",
                    "url"  => "/nav_iten_1"
                ],
                [
                    'type' => "nav-link",
                    'icon' => "fas fa-fw fa-user-graduate",
                    'title'=> "Practicas profecionales ",
                    "url"  => "/nav_iten_1"
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
                    "url"  => "/validacion"
                ]
            ]
        ];
    }




