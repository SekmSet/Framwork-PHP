<?php

namespace Core;

class Router
{
    private static $routes = [];

    public static function connect($url, $route)
    {
        $url = preg_replace('#:([\w]+)#', '([^/]+)', $url);

        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        $match = self::match($url);

        if ($match === false) {
            $route = [
                'controller' => 'app',
                'action' => 'notFound',
            ];
            $args = [];
        } else {
            $route = self::$routes[$match['path']];
            $args = $match['args'];
        }

        self::call_controller($route, $args);
    }

    private static function match($url)
    {
        $action = str_replace(BASE_URI, '', trim($url));

        foreach (self::$routes as $path => $param) {
            $regex = "#^$path$#i";

            if (preg_match($regex, $action, $routeArg)) {
                array_shift($routeArg); // remove 1st arg (full path)

                return [
                    'path' => $path,
                    'args' => $routeArg,
                ];
            }
        }

        return false;
    }

    /**
     * @param array $route
     * @param array $args
     */
    private static function call_controller(array $route, array $args): void
    {
        $method = strtolower($route['action']) . 'Action';
        $class_name = ucfirst($route['controller']) . 'Controller';
        $controller_name = 'Controller\\' . $class_name;

        $controller = new $controller_name();

        call_user_func_array([$controller, $method], $args);
    }
}
