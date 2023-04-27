<?php

$menu = [
    "Estudiante" => [
        [
            'type' => "nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "nav_iten_1",
            "url"  => "/nav_iten_1"
        ],
        [
            'type' => "grupo-nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "nav_iten_1",
            'sub'  => [
                "sub_nav1"=>"/url1",
                "sub_nav2"=>"/url2",
                "sub_nav3"=>"/url3",
            ]
        ]
    ],
    "section_title_2" => [
        [
            'type' => "nav-link",
            'icon' => "fas fa-fw fa-table",
            'title'=> "nav_iten_1",
            "url"  => "/nav_iten_1"
        ]
    ]
];

?>