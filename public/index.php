<?php

define("__DIRC__",str_replace("\public",'',__DIR__));
include __DIRC__."\core\conf.php";
include __DIRC__."\core\autoloader.php";

$A =new app\controllers\user();
$A->indexlogin();


