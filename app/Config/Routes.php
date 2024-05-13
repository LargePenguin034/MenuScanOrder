<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#cutomer routes
$routes->get('/menu/(:num)', 'SiteController::menu/$1');


#Owner routes
$routes->get('/', 'SiteController::index');
$routes->get('/orders/(:num)', 'SiteController::orders/$1');
$routes->get('/table/(:num)', 'SiteController::table/$1');
$routes->get('/edit/(:num)', 'SiteController::edit_menu/$1');
$routes->get('/edit_name/(:num)', 'SiteController::edit_menu/$1');
$routes->get('/edit_type/(:num)', 'SiteController::edit_menu/$1');
$routes->match(['get', 'post'], '/edit/(:num)', 'SiteController::edit_menu/$1');
$routes->match(['get', 'post'], '/edit_name/(:num)', 'SiteController::edit_name/$1');
$routes->match(['get', 'post'], '/edit_type/(:num)', 'SiteController::edit_type/$1');


# auth routes
$routes->get('/login', 'Auth::google_login');  // Route to initiate Google login
$routes->get('/login/callback', 'Auth::google_callback');  // Callback route after Google auth
$routes->get('/logout', 'Auth::logout');

#admin routes
$routes->get('/admin', 'SiteController::admin');
$routes->get('/admin/delete/(:num)', 'SiteController::delete_restaurant/$1');
