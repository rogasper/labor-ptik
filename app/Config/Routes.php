<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

$routes->group('admin', function ($routes) {
    // Dashboard
    $routes->get('/', 'Home::admin');
    // Fasilitas
    $routes->get('fasilitas', 'Admin/FasilitasController::index');
    $routes->get('fasilitas/table', 'Admin/FasilitasController::getTable');
    $routes->get('fasilitas/form', 'Admin/FasilitasController::form');
    $routes->get('fasilitas/form/(:segment)', 'Admin\FasilitasController::edit/$1');
    $routes->post('fasilitas/insert', 'Admin/FasilitasController::insert');
    $routes->put('fasilitas/(:segment)', 'Admin\FasilitasController::update/$1');
    $routes->delete('fasilitas/(:segment)', 'Admin\FasilitasController::hapus/$1');
    // Laboratorium
    $routes->get('laboratorium', 'Admin/LaboratoriumController::index');
    $routes->get('laboratorium/table', 'Admin/LaboratoriumController::getTable');
    $routes->get('laboratorium/form', 'Admin/LaboratoriumController::form');
    $routes->get('laboratorium/form/(:segment)', 'Admin\LaboratoriumController::edit/$1');
    $routes->post('laboratorium/insert', 'Admin/LaboratoriumController::insert');
    $routes->put('laboratorium/(:segment)', 'Admin\LaboratoriumController::update/$1');
    $routes->delete('laboratorium/(:segment)', 'Admin\LaboratoriumController::hapus/$1');
});

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
