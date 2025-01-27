<?php

require_once('system/loader.php');

$uri = $_SERVER['REQUEST_URI'];

$uri = explode("/",$uri);
if (file_exists("mvc/controller"."/$uri[2].php")){
    $class = $uri[2];
    $method = $uri[3];
    $params = array();
    
    for ($i = 3 ;$i < count($uri) ; $i++){
    
        $params[] = $uri[$i];
    }
    
    $classname=ucfirst($class)."Controller";
    //autoLoad
    $instance = new $classname();
    
    call_user_func_array(array($instance,$method),$params);
}else{
    // header("1");
    echo("controller ". $uri[1] . "  Not exist!!! <br> contact me here: <a href=\"https:arashghsz.com/#contact\">www.arashghsz.com</a>");
}