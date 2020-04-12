<?php

namespace Core;

class Core
{
    public function run()
    {
        include('src/routes.php');

        $uri = $_SERVER['REQUEST_URI'];
        $uri_array = explode('?', $uri);


        Router::get($uri_array[0]);
    }
}
