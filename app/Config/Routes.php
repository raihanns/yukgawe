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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('create-db', function () {
	$forge = \Config\Database::forge();
	if ($forge->createDatabase('weplan')) {
		echo 'Database created!';
	}
});

// $routes->get('/', 'Home::index');
$routes->addRedirect('/', 'home');

$routes->get('gawe', 'gawe::index');
$routes->get('gawe/add', 'gawe::create');
$routes->post('gawe', 'gawe::store');
$routes->post('gawe/edit/(:num)', 'gawe::edit/$1');
$routes->put('gawe/(:any)', 'gawe::update/$1');
$routes->delete('gawe/(:segment)', 'gawe::destroy/$1');

//menu
$routes->get('menu/add', 'menu::create');
$routes->post('menu', 'menu::store');
$routes->post('menu/edit/(:num)', 'menu::edit/$1');
$routes->put('menu/(:any)', 'menu::update/$1');
$routes->delete('menu/(:segment)', 'menu::destroy/$1');

//submenu
$routes->get('submenu/add', 'submenu::create');
$routes->post('submenu', 'submenu::store');
$routes->post('submenu/edit/(:num)', 'submenu::edit/$1');
$routes->put('submenu/(:any)', 'submenu::update/$1');
$routes->delete('submenu/(:segment)', 'submenu::destroy/$1');

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
