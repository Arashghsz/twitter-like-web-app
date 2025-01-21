<?php

class View{
    public static function render($filename,$params=array())
    {
        extract($params);
        require_once ('mvc/view/'.$filename.'.php');
    }
}