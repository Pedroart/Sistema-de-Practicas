<?php

define("__DIRC__",preg_replace("/\\public(.*)/",'',__DIR__));
include __DIRC__."\core\conf.php";
include __DIRC__."\core\autoloader.php";
include __DIRC__."\core\\router.php";


any('/404','app/views/404.php');