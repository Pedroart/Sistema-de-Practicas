<?php

define("__DIRC__",str_replace("\public",'',__DIR__));

require_once __DIRC__.'/core/router.php';

// A route with a callback
get('/callback', function(){
    echo 'Callback executed';
  });
  
  // A route with a callback passing a variable
  // To run this route, in the browser type:
  // http://localhost/user/A
  get('/callback/$name', function($name){
    echo "Callback executed. The name is $name";
  });
  
  // A route with a callback passing 2 variables
  // To run this route, in the browser type:
  // http://localhost/callback/A/B
  get('/callback/$name/$last_name', function($name, $last_name){
    echo "Callback executed. The full name is $name $last_name";
  });