<?php
namespace Core ;

class Core
{

    private $params=[];

    public function run ()
    {
        echo __CLASS__ . ' [ OK ]' . PHP_EOL ;

        $uri = $_SERVER['REQUEST_URI'];
        $array_uri=explode('/',$uri);
        $method = strtolower(array_pop($array_uri));
        $controller_name = 'Controller\\'.ucfirst(array_pop($array_uri)).'Controller';

        $controller =  new $controller_name();

        if(method_exists($controller,$method)){
            call_user_func_array([$controller, $method], $this->params );
        } elseif(empty($method) && empty($controller_name)) {
            echo '404';

        } else {
            $new_controller_name = 'Controller\\AppController'.ucfirst(array_pop($array_uri)).'Controller';
            call_user_func_array([$new_controller_name, 'index'], $this->params );
        }
    }
}