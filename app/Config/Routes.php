<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SiteController::index');
$routes->get('/menu', 'SiteController::menu');
$routes->get('/orders', 'SiteController::orders');
$routes->get('/table', 'SiteController::table');
