<?php

require_once('system/loader.php');

$uri = $_SERVER['REQUEST_URI'];

$uri = explode("/",$uri);
if (file_exists("/home/arashghs/twitter.arashghsz.com/mvc/controller"."/$uri[1].php")){
    $class = $uri[1];
    $method = $uri[2];
    $params=array();
    
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