<?php

spl_autoload_register(function($className) {
	$file = __DIREC__.'/'.$className.'.php';
    //echo $file;
    include $file;
});