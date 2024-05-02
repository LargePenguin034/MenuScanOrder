<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SiteController::index');
$routes->get('/menu/(:num)', 'SiteController::menu/$1');
$routes->get('/orders', 'SiteController::orders');
$routes->get('/table', 'SiteController::table');

// Routes for admin
$routes->get('/edit/(:num)', 'SiteController::edit_menu/$1');
$routes->match(['get', 'post'], '/edit/(:num)', 'SiteController::edit_menu/$1');

