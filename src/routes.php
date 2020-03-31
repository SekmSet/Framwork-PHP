<?php

use Core\Router;

Router::connect ('/', [
    'controller' => 'app',
    'action' => 'index'
]);
Router::connect ('/register', [
    'controller'=>'user',
    'action'=> 'add'
]);

Router::connect ('/register_new', [
    'controller'=>'user',
    'action'=> 'register'
]);

