<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->post('res', 'Home::search', ['filter' => 'auth']);
$routes->post('loc', 'Home::searchdetail', ['filter' => 'auth']);
// $routes->get('/', 'Home::index');
// $routes->post('res', 'Home::search');
$routes->get('login', 'Auth::index');
$routes->post('login/proses', 'Auth::login');
$routes->get('logout', 'Auth::logout');


$routes->get('adm', 'Adm::index', ['filter' => 'auth']);
$routes->get('adm_katalog', 'Adm::katalog', ['filter' => 'auth']);
$routes->get('/adm/ubahbuku/(:$alphanum)', 'Adm::detailubahbuku/$1');
$routes->delete('/adm/hapusbuku/(:alphanum)', 'Adm::hapusbuku/$1');
$routes->get('adm_lap_katalog', 'Adm::cetakkatalog', ['filter' => 'auth']);


$routes->get('adm_rak', 'Adm::rak', ['filter' => 'auth']);
$routes->get('/adm/ubahrak/(:$alphanum)', 'Adm::detailubahrak/$1');
$routes->delete('/adm/hapusrak/(:alphanum)', 'Adm::hapusrak/$1');

$routes->get('adm_user', 'Adm::user', ['filter' => 'auth']);
$routes->get('/adm/ubahuser/(:$alphanum)', 'Adm::detailubahuser/$1');
$routes->delete('/adm/hapususer/(:alphanum)', 'Adm::hapususer/$1');

$routes->get('adm_history', 'Adm::history', ['filter' => 'auth']);
$routes->get('adm_lap_history', 'Adm::cetakhistory', ['filter' => 'auth']);
// $routes->get('adm', 'Adm::index');
// $routes->get('adm_katalog', 'Adm::katalog');
// $routes->get('adm_rak', 'Adm::rak');
// $routes->get('adm_user', 'Adm::user');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
