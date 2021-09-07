<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Route Biro
$routes->get('/biro', 'Biro::index');
$routes->get('/biro/create', 'Biro::create');
$routes->get('/biro/edit/(:alphanum)', 'Biro::edit/$1');
$routes->get('/biro/(:alphanum)', 'Biro::detail/$1');

$routes->post('/biro/store', 'Biro::store');
$routes->post('/biro/update/(:alphanum)', 'Biro::update/$1');

$routes->delete('/biro/(:alphanum)', 'Biro::delete/$1');

// Route Bagian
$routes->get('/bagian', 'Bagian::index');
$routes->get('/bagian/create', 'Bagian::create');
$routes->get('/bagian/edit/(:alphanum)', 'Bagian::edit/$1');
$routes->get('/bagian/(:alphanum)', 'Bagian::detail/$1');

$routes->post('/bagian/store', 'Bagian::store');
$routes->post('/bagian/update/(:alphanum)', 'Bagian::update/$1');

$routes->delete('/bagian/(:alphanum)', 'Bagian::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
