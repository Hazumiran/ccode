<?php

namespace Config;

use App\Controllers\AdminC;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Admin
$routes->get('/adminlogin', 'AdminC::v_login');
$routes->get('/admin', 'AdminC::index', ['as' => 'admin']);
$routes->get('/dashboardusers', 'AdminC::users');

// users
$routes->get('/AdminC/createusers', 'AdminC::create');
$routes->get('/AdminC/update/(:segment)', 'AdminC::update/$1');

// menu

$routes->get('/MenuC/createmenu', 'MenuC::create');
$routes->get('/MenuC/update/(:segment)', 'MenuC::update/$1');

// order




$routes->get('/OrderC/createorder', 'OrderC::create');
$routes->get('/OrderC/update/(:segment)', 'OrderC::update/$1');

//Authentication Login & Register
// $routes->get('/login', 'auth::v_login');
$routes->get('/registrasi', 'auth::v_register');
$routes->get('/home', 'AdminC::index', ['as' => 'pelanggan']);

$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');





/**
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
