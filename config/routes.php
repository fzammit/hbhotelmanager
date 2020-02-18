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
$router->get('/rooms/', 'RoomsController@index');
$router->get('/rooms/(\d+)', 'RoomsController@show'); // Affichage de 1 room

$router->get('/rooms/new', 'RoomsController@new');
$router->post('/rooms/new', 'RoomsController@create');

$router->get('/rooms/(\d+)/edit', 'RoomsController@edit');
$router->post('/rooms/(\d+)/edit', 'RoomsController@update');

$router->get('/rooms/(\d+)/delete/', 'RoomsController@delete');


/**
 * Routes CLIENT
 */
$router->get('/clients', 'ClientsController@index');
$router->get('/clients/(\d+)', 'ClientsController@show');// Affichage de 1 client

$router->get('/clients/new', 'ClientsController@new');
$router->post('/clients/new', 'ClientsController@create');

$router->get('/clients/(\d+)/edit', 'ClientsController@edit');
$router->post('/clients/(\d+)/edit', 'ClientsController@update');

$router->get('/clients/(\d+)/delete', 'ClientsController@delete');


$router->run();