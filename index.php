<?php

include "system/loader.php";

$uri = $_SERVER['REQUEST_URI'];
$uri = explode( "/", $uri);

$class = $uri[1];
$method = $uri[2];
$params = array();

for ($i=3; $i <count($uri) ; $i++) { 
    $params[] = $uri[$i] . '<br>';
}
// require_once('controller/'.$class.'.php');
$classname = ucfirst($class) . "Controller";
$instance = new $classname();

call_user_func_array(array($instance, $method), $params);

?>