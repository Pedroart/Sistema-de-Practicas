<?php

spl_autoload_register(function($className) {
	$file = __DIREC__.'/'.$className.'.php';
    include $file;
});