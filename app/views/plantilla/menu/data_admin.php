<?php

$menu = [
    "PRACTICAS PRE PROFECIONALES" => [
        [
            'type' => "grupo-nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "Efectivas",
            'sub'  => [
                "Bienvenida"=>"/url1",
                "Historial de cartas"=>"/url2",
                "Estado"=>"/url3",
            ]
        ],
        [
            'type' => "grupo-nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "Desempeño laboral",
            'sub'  => [
                "Bienvenida"=>"/url1",
                "Proceso"=>"/url2",
                "Estado"=>"/url3",
            ]
        ]
    ],
    "Matriculas" => [
        [
            'type' => "nav-link",
            'icon' => "fas fa-check",
            'title'=> "Validacion",
            "url"  => "validaciones"
        ],
    ],
    "Usuarios" => [
        [
            'type' => "grupo-nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "Alumnos",
            'sub'  => [
                "Lista"=>"/lista_usuarios",
                "Agregar Lote"=>"/crear_usuarios",

            ]
        ],
    ]
];

