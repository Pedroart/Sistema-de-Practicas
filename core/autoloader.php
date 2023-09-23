<?php

spl_autoload_register(function($className) {
	$file = __DIREC__.'/'.str_replace('\\', '/', $className).'.php';
    include $file;
});