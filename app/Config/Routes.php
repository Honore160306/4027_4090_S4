<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// $routes->get('/', 'Home::index');
$routes->get('/test', 'Test::index'); 

$routes->get('/', 'AccueilController::accueil');

$routes->group('operateur', function($routes) {
    $routes->get('/', 'PrefixeController::index');
    $routes->get('prefixes', 'PrefixeController::index');
    $routes->post('prefixes/create', 'PrefixeController::create');
    $routes->get('prefixes/delete/(:num)', 'PrefixeController::delete/$1');

    $routes->get('baremes', 'BaremeController::index');
    $routes->post('baremes/create', 'BaremeController::create');
    $routes->get('baremes/delete/(:num)', 'BaremeController::delete/$1');
    
    $routes->get('gains', 'GainController::index');
    $routes->get('clients', 'ClientController::index');
});
