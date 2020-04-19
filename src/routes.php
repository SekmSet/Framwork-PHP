<?php

use Core\Router;

// page accueil
Router::connect('/', [
    'controller' => 'app',
    'action' => 'index'
]);

//page création compte nouveau utilisateur
Router::connect('/register', [
    'controller' => 'user',
    'action' => 'add'
]);

// page pour le traitement du formulaire de création d'un nouveau utilisateur
Router::connect('/register_new', [
    'controller' => 'user',
    'action' => 'register'
]);

// page de connexion
Router::connect('/login', [
    'controller' => 'user',
    'action' => 'login'
]);

// page gestion du formulaire de connexion
Router::connect('/login_check', [
    'controller' => 'user',
    'action' => 'loginCheck'
]);

// page / formulaire du formulaire de déconnection
Router::connect('/logout', [
    'controller' => 'user',
    'action' => 'logout'
]);

// page gestion du formulaire de modification du profil
Router::connect('/profil/changes', [
    'controller' => 'user',
    'action' => 'changes'
]);

// page gestion du formulaire de suppression du compte
Router::connect('/profil/delete', [
    'controller' => 'user',
    'action' => 'delete'
]);

// page de profil
Router::connect('/profil', [
    'controller' => 'user',
    'action' => 'show_profil'
]);

// page pour lister les membres
Router::connect('/members', [
    'controller' => 'user',
    'action' => 'member'
]);

// page pour les abonnements
Router::connect('/subscription', [
    'controller' => 'price',
    'action' => 'subscription'
]);

// page pour les prix
Router::connect('/prices', [
    'controller' => 'price',
    'action' => 'reduction'
]);

// page pour lister les films
Router::connect('/movies', [
    'controller' => 'movie',
    'action' => 'movie'
]);

// page pour ajouter un nouveau film
Router::connect('/movies/new', [
    'controller' => 'movie',
    'action' => 'newMovie'
]);

// page gestion du formulaire pour supprimer un film
Router::connect('/movies/delete/:id', [
    'controller' => 'movie',
    'action' => 'deleteMovie'
]);

// page pour modifier un film
Router::connect('/movies/change/:id', [
    'controller' => 'movie',
    'action' => 'changeMovie'
]);

// page d'un film
Router::connect('/movies/:id', [
    'controller' => 'movie',
    'action' => 'movieGender'
]);

// pour ajouter un film à son historique
Router::connect('/movies/add/history/:id', [
    'controller' => 'history',
    'action' => 'movieHistory'
]);

// page pour voir son historique de film
Router::connect('/history', [
    'controller' => 'history',
    'action' => 'history'
]);

// page gestion du formulaire pour supprimer un film de son historique
Router::connect('/history/movie/delete/:id', [
    'controller' => 'history',
    'action' => 'deleteHistory'
]);

// page pour lister les salles
Router::connect('/salle', [
    'controller' => 'movie',
    'action' => 'salle'
]);

// page d'une salle
Router::connect('/salle/:name', [
    'controller' => 'movie',
    'action' => 'programme'
]);

// page pour lister les job
Router::connect('/job', [
    'controller' => 'job',
    'action' => 'job'
]);

// page pour lister les genres
Router::connect('/genres', [
    'controller' => 'genre',
    'action' => 'list'
]);

// pour créer un genre
Router::connect('/genre/create', [
    'controller' => 'genre',
    'action' => 'create'
]);

// pour supprimer un genre
Router::connect('/genre/delete/:id', [
    'controller' => 'genre',
    'action' => 'delete'
]);

// page pour modifier un genre + gestion du formulaire
Router::connect('/genre/change/:id', [
    'controller' => 'genre',
    'action' => 'change'
]);
