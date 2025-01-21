<?php

function str_replace_first($from, $to, $content)
{
    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $content, 1);
}

function str_contains($string,$search){
    if (strpos($string, $search) !== false) {
        return true;
    }
    return false;
}



function get_link($string){

    $string=preg_replace('/(https|ftp):\/\/[a-zA-Z0-9\.\/]+/','<a href="$0" target="_blank">$0</a>',$string);
    $string=preg_replace('/#([(a-zA-z0-9]+)/','<a href="/trend/hashtag/latest/$1">$0</a>',$string);
    $string=preg_replace('/@([(a-zA-z0-9]+)/','<a href="/user/profile/$1">$0</a>',$string);
    return $string;

}