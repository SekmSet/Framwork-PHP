<?php


function my_autoloader($class)
{
    $class = str_replace('\\', '/', $class) . '.php';
    if (file_exists($class)) {
        include $class;
    } elseif (file_exists('src/' . $class)) {
        include 'src/' . $class;
    }
}

spl_autoload_register('my_autoloader');
