<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'AccueilController::accueil');
$routes->get('logout', 'AccueilController::accueil');

$routes->group('operateur', function($routes) {
    $routes->get('/', 'PrefixeController::index');
    $routes->get('prefixes', 'PrefixeController::index');
    $routes->post('prefixes/create', 'PrefixeController::create');
    $routes->get('prefixes/delete/(:num)', 'PrefixeController::delete/$1');

    $routes->get('baremes', 'BaremeController::index');
    $routes->post('baremes/create', 'BaremeController::create');
    $routes->get('baremes/edit/(:num)', 'BaremeController::edit/$1');
    $routes->post('baremes/update/(:num)', 'BaremeController::update/$1');
    $routes->get('baremes/delete/(:num)', 'BaremeController::delete/$1');
    
    $routes->get('gains', 'GainController::index');
    $routes->get('clients', 'ClientController::index');
});

$routes->get('/client/login', 'ClientLoginController::login');
$routes->post('/client/solde', 'ClientSoldeController::solde');
$routes->get('/client/solde2', 'ClientSoldeController::solde2');
$routes->get('/client/epargne', 'ClientSoldeController::epargne');

$routes->get('/client/depot', 'ClientDepotController::depot');
$routes->get('/client/depot/ajout', 'ClientDepotController::ajout');
$routes->get('/client/retrait', 'ClientRetraitController::retrait');
$routes->get('/client/retrait/ajout', 'ClientRetraitController::ajout');
$routes->get('/client/transfert', 'ClientTransfertController::transfert');
$routes->get('/client/transfert/ajout', 'ClientTransfertController::ajout');

$routes->get('/client/historique', 'ClientHistoriqueController::historique');
