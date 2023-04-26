<?php

spl_autoload_register(function($className) {
	$file = __DIRC__.'\\'.$className.'.php';
    //echo $file;
    include $file;
});