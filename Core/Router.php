<?php

namespace Core;

class Router
{

   // private static $base_uri = 'MVC_PiePHP/';
    private static $routes = [
        /*'/' => [
            'controller' => 'app',
            'action' => 'index'
        ],
        '/register' => [
            'controller' => 'app',
            'action' => 'index'
        ],*/
    ];

    public static function connect($url, $route){
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        print_r(self::$routes);
        $action = str_replace(BASE_URI, '', trim($url));

        if(!isset(self::$routes[$action])) {
            $route = [
                'controller' => 'app',
                'action' => 'notFound'
            ];
        } else {
            $route = self::$routes[$action];
        }

        $method = strtolower($route['action']).'Action';
        $class_name = ucfirst($route['controller']).'Controller';
        $controller_name = 'Controller\\'.$class_name;

        $controller =  new $controller_name();

        call_user_func_array([$controller, $method], []);
    }
}


