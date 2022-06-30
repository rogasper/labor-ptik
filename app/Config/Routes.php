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
$routes->set404Override(function () {
    return view('404');
});
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Auth
$routes->get('/login', 'Auth/AuthController::index', ["filter" => "noauth"]);
$routes->get('/logout', 'Auth/AuthController::logout');
$routes->get('/register', 'Auth/AuthController::register', ["filter" => "noauth"]);
$routes->post('/login', 'Auth/AuthController::login');
$routes->post('/register', 'Auth/AuthController::newAccount');
$routes->get('/forget', 'Auth/AuthController::forget');
$routes->post('/requestreset', 'Auth/AuthController::requestreset');
$routes->put('/resetpassword/(:segment)', 'Auth\AuthController::resetPassword/$1');


$routes->get('/tim', 'Home::tim');
$routes->get('/kontak', 'Home::kontak');
$routes->get('sewa', 'Member/SewaController::index');
$routes->get('sewa/software', 'Member/SewaController::software');
$routes->get('sewa/multimedia', 'Member/SewaController::multimedia');
$routes->get('sewa/network', 'Member/SewaController::network');

$routes->group('member', ["filter" => "auth"], function ($routes) {
    $routes->get('sewa/(:segment)', 'Member\SewaController::sewa/$1');
    $routes->get('riwayat/(:segment)', 'Member\RiwayatController::index/$1');
    $routes->post('booking', 'Member\SewaController::booking');

    $routes->put('user/edit/(:segment)', 'Member\MemberController::update/$1');
    $routes->get('user/editform/(:segment)', 'Member\MemberController::getEditForm/$1');
    $routes->put('user/resetform/resetpassword/(:segment)', 'Member\MemberController::resetPassword/$1');
    $routes->post('user/resetform/(:segment)', 'Member\MemberController::getResetForm/$1');
    $routes->get('user/(:segment)', 'Member\MemberController::detail/$1');
});

$routes->group('admin', ["filter" => "auth-admin"], function ($routes) {
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

    // User
    // pengaturan user
    $routes->get('user', 'Admin/UserController::index');
    $routes->get('user/table', 'Admin/UserController::getTable');
    $routes->put('user/edit/(:segment)', 'Admin\UserController::update/$1');
    $routes->get('user/editform/(:segment)', 'Admin\UserController::getEditForm/$1');
    $routes->put('user/resetform/resetpassword/(:segment)', 'Admin\UserController::resetPassword/$1');
    $routes->post('user/resetform/(:segment)', 'Admin\UserController::getResetForm/$1');
    $routes->get('user/(:segment)', 'Admin\UserController::detail/$1');

    // Konfirmasi Akun
    $routes->get('userconfirm', 'Admin/UserController::confirmindex');
    $routes->get('userconfirm/table', 'Admin/UserController::getTableConfirm');
    $routes->get('userconfirm/(:segment)/confirm', 'Admin\UserController::confirmAccount/$1');

    // Reset Akun
    $routes->get('userreset', 'Admin/UserController::resetindex');
    $routes->get('userreset/table', 'Admin/UserController::getTableReset');
    $routes->get('userreset/(:segment)/confirm', 'Admin\UserController::confirmReset/$1');

    // Reservasi
    // All Data Reservasi Order
    $routes->get('reservasi', 'Admin/OrderController::index');
    $routes->get('reservasi/table', 'Admin/OrderController::getTable');
    $routes->get('reservasi/form/(:segment)', 'Admin\OrderController::getDetailForm/$1');

    // Reservasi Payment
    $routes->get('paymentreservasi', 'Admin/OrderController::payindex');
    $routes->get('paymentreservasi/table', 'Admin/OrderController::getPayTable');
    $routes->get('paymentreservasi/form/(:segment)', 'Admin\OrderController::getConfirmForm/$1');
    $routes->get('paymentreservasi/(:segment)/confirm', 'Admin\OrderController::confirmPayment/$1');
    $routes->get('paymentreservasi/(:segment)/cancel', 'Admin\OrderController::cancelPayment/$1');
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
