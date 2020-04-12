<?php

use Core\Router;

Router::connect('/', [
    'controller' => 'app',
    'action' => 'index'
]);

Router::connect('/register', [
    'controller' => 'user',
    'action' => 'add'
]);

Router::connect('/register_new', [
    'controller' => 'user',
    'action' => 'register'
]);

Router::connect('/login', [
    'controller' => 'user',
    'action' => 'login'
]);

Router::connect('/login_check', [
    'controller' => 'user',
    'action' => 'loginCheck'
]);

Router::connect('/profil/changes', [
    'controller' => 'user',
    'action' => 'changes'
]);

Router::connect('/logout', [
    'controller' => 'user',
    'action' => 'logout'
]);

Router::connect('/profil/delete', [
    'controller' => 'user',
    'action' => 'delete'
]);

Router::connect('/user/:id', [
    'controller' => 'user',
    'action' => 'show'
]);

Router::connect('/profil', [
    'controller' => 'user',
    'action' => 'show_profil'
]);

Router::connect('/members', [
    'controller' => 'user',
    'action' => 'member'
]);

Router::connect('/subscription', [
    'controller' => 'price',
    'action' => 'subscription'
]);

Router::connect('/prices', [
    'controller' => 'price',
    'action' => 'reduction'
]);

Router::connect('/movies', [
    'controller' => 'movie',
    'action' => 'movie'
]);

Router::connect('/movies/:name', [
    'controller' => 'movie',
    'action' => 'movieGender'
]);

Router::connect('/history', [
    'controller' => 'movie',
    'action' => 'history'
]);

Router::connect('/salle', [
    'controller' => 'movie',
    'action' => 'salle'
]);

Router::connect('/salle/:name', [
    'controller' => 'movie',
    'action' => 'programme'
]);

Router::connect('/job', [
    'controller' => 'job',
    'action' => 'job'
]);
