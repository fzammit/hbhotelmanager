<?php

$router = $container->getRouter();
$router->setNamespace('App\Controller');

/**
 * Routes de base
 */
$router->get('', 'PagesController@index'); // Page d'accueil contenant entre autres la liste des rooms

/**
 * Routes ROOM
 */
$router->get('/rooms/(\d+)', 'RoomsController@show'); // Affichage de 1 room

$router->get('/rooms/new', 'RoomsController@new');// Affichage du formulaire
$router->post('/rooms', 'RoomsController@create');// Création d'une room

$router->get('/rooms/(\d+)/edit', 'RoomsController@edit');// Edition d'une room
$router->post('/rooms/(\d+)/deleteClient', 'RoomsController@deleteClient');// mise à jour d'une room

$router->get('/rooms/(\d+)/delete/', 'RoomsController@delete');// Supprimer une room


/**
 * Routes CLIENT
 */
$router->get('/clients', 'ClientsController@index');// Affichage de l'ensemble des Clients
$router->get('/clients/(\d+)', 'ClientsController@show');// Affichage de 1 client

$router->get('/clients/new', 'ClientsController@new');// Afichage du formulaire
$router->post('/clients/new', 'ClientsController@create');// Création d'un client

$router->get('/clients/(\d+)/edit', 'ClientsController@edit');// Edition d'un client
$router->post('/clients/(\d+)/edit', 'ClientsController@update');// Mise à jour d'un client

$router->get('/clients/(\d+)/delete', 'ClientsController@delete');// Suppression 'un client

$router->run();