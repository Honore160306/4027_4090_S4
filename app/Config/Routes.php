<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'AccueilController::accueil');

$routes->get('/client/login', 'ClientLoginController::login');
$routes->post('/client/solde', 'ClientSoldeController::solde');

$routes->get('/client/depot', 'ClientDepotController::depot');
$routes->get('/client/depot/ajout', 'ClientDepotController::ajout');
$routes->get('/client/retrait', 'ClientRetraitController::retrait');
$routes->get('/client/retrait/ajout', 'ClientRetraitController::ajout');
$routes->get('/client/transfert', 'ClientTransfertController::transfert');
$routes->get('/client/transfert/ajout', 'ClientTransfertController::ajout');

$routes->get('/client/historique', 'ClientHistoriqueController::historique');
