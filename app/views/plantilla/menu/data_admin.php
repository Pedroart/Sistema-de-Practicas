<?php

$menu = [
    "Proceso" => [
        [
            'type' => "nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "Efectivas",
            "url"  => "validaciones"
        ],
        [
            'type' => "nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "Efectivas",
            "url"  => "validaciones"
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
            'icon' => "fa fa-users",
            'title'=> "Alumnos",
            'sub'  => [
                "Lista"=>"/lista_usuarios",
                "Agregar Lote"=>"/crear_usuarios",

            ]
        ],
        [
            'type' => "grupo-nav-link",
            'icon' => "fa fa-graduation-cap",
            'title'=> "Profesores",
            'sub'  => [
                "Lista"=>"/lista_usuarios",
                "Agregar"=>"/crear_usuarios",

            ]
        ],
        [
            'type' => "grupo-nav-link",
            'icon' => "fa fa-university",
            'title'=> "Asistentes",
            'sub'  => [
                "Lista"=>"/lista_usuarios",
                "Agregar"=>"/crear_usuarios",

            ]
        ],
    ]
];

