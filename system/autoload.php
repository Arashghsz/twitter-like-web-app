<?php
function my_autoloader($classname) {

    if (strpos($classname, 'Controller') !== false) {

        $filename = lcfirst($classname);
        $filename = str_replace('Controller', "", $filename);
        $filename = 'mvc/controller/' . $filename . ".php";
        require_once($filename);

    }

    if (strpos($classname, 'Model') !== false) {

        $filename = lcfirst($classname);
        $filename = str_replace('Model', "", $filename);
        $filename = 'mvc/model/' . $filename . ".php";
        require_once($filename);

    }
}
spl_autoload_register('my_autoloader');
