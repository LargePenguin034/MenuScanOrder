<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#cutomer routes
$routes->get('/menu/(:num)/(:num)', 'SiteController::menu/$1/$2');
$routes->match(['get', 'post'], '/menu/(:num)/(:num)', 'SiteController::menu/$1/$2');

$routes->get('/test', 'SiteController::test');



#Owner routes
$routes->get('/', 'SiteController::index');

$routes->group('owner', ['filter' => 'login'], function ($routes) {
    $routes->get('order', 'SiteController::orders');
    $routes->get('tables', 'SiteController::table');
    $routes->get('edit', 'SiteController::edit_menu');
    $routes->get('edit_name', 'SiteController::edit_menu');
    $routes->get('edit_type', 'SiteController::edit_menu');
    $routes->get('download', 'SiteController::downloadAll');
    $routes->get('download/(:num)', 'SiteController::downloadOne/$1');
    $routes->match(['get', 'post'], 'edit', 'SiteController::edit_menu');
    $routes->match(['get', 'post'], 'edit_name', 'SiteController::edit_name');
    $routes->match(['get', 'post'], 'edit_type', 'SiteController::edit_type');
    $routes->match(['get', 'post'], 'tables', 'SiteController::table');
    $routes->match(['get', 'post'], 'order', 'SiteController::orders');
});



# auth routes
$routes->get('/login', 'Auth::google_login');  // Route to initiate Google login
$routes->get('/login/callback', 'Auth::google_callback');  // Callback route after Google auth
$routes->get('/logout', 'Auth::logout');

#admin routes
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'SiteController::admin');
    $routes->get('edit/(:num)', 'SiteController::admin_edit/$1');
    $routes->get('delete/(:num)', 'SiteController::delete_restaurant/$1');
});