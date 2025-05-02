<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Route untuk Home
$routes->get('/', 'KostController::showthreeitem');
// $routes->get('/beranda', 'KostController::showthreeitem');
$routes->get('/rekomendasi', 'KostController::listAll');
$routes->get('/kost/detail/(:num)', 'KostController::detail/$1');
$routes->get('/kost/search', 'KostController::search');
$routes->get('/kost/filter', 'KostController::filter');
$routes->get('/profile', 'ProfileController::viewProfile');
$routes->get('/pemilik', 'Home::index', ['filter' => 'auth:pemilik']);
$routes->get('/pemilik/kost', 'KostOwnerController::showAll', ['filter' => 'auth:pemilik']);
$routes->get('/pemilik/kost/detail/(:num)', 'KostOwnerController::show/$1', ['filter' => 'auth:pemilik']);
$routes->get('pemilik/kost/edit/(:num)', 'KostOwnerController::editKostOwner/$1');
$routes->post('pemilik/kost/update/(:num)', 'KostOwnerController::updateKostOwner/$1');

// Delete kost
$routes->get('pemilik/kost/delete/(:num)', 'KostOwnerController::deleteKostOwner/$1');

// View kost details
$routes->get('pemilik/kost/view/(:num)', 'KostOwnerController::viewKostOwner/$1');

// Delete image
$routes->get('pemilik/kost/delete-image/(:num)', 'KostOwnerController::deleteImage/$1');

// Update kost status (AJAX)
$routes->post('pemilik/kost/update-status', 'KostOwnerController::updateStatus');
$routes->get('/search', 'KostController::search');
$routes->post('/pembayaran', 'PembayaranController::bayar', ['filter' => 'auth']);

// Route untuk Login
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authLogin');

// Route untuk Sign Up
$routes->get('/signup', 'AuthController::register');

$routes->post('/signup', 'AuthController::saveRegister');
$routes->get('/signup/pemilik', 'AuthController::registerPemilik');

$routes->post('/signup/pemilik', 'AuthController::saveRegisterPemilik');
// Route untuk Logout
$routes->get('/logout', 'AuthController::logout');

$routes->get('/admin', 'AdminController::dashboard', ['filter' => 'auth:admin']);

$routes->get('/admin/kost', 'KostController::index', ['filter' => 'auth:admin']);
$routes->get('/admin/kost/new', 'KostController::new', ['filter' => 'auth:admin']);
$routes->post('/admin/kost', 'KostController::create', ['filter' => 'auth:admin']);

$routes->post('/pemilik/create', 'KostOwnerController::create', ['filter' => 'auth:pemilik']);
$routes->get('/admin/kost/edit/(:segment)', 'KostController::edit/$1', ['filter' => 'auth:admin']);
$routes->put('/admin/kost/(:segment)', 'KostController::update/$1', ['filter' => 'auth:admin']);
$routes->delete('/admin/kost/(:segment)', 'KostController::delete/$1', ['filter' => 'auth:admin']);

$routes->get('/admin/fasilitas', 'FasilitasController::index', ['filter' => 'auth:admin']);
$routes->get('/admin/fasilitas/create', 'FasilitasController::create', ['filter' => 'auth:admin']);
$routes->post('/admin/fasilitas', 'FasilitasController::store', ['filter' => 'auth:admin']);
$routes->get('/admin/fasilitas/edit/(:num)', 'FasilitasController::edit/$1', ['filter' => 'auth:admin']);
$routes->post('/admin/fasilitas/update/(:num)', 'FasilitasController::update/$1', ['filter' => 'auth:admin']);
$routes->get('/admin/fasilitas/delete/(:num)', 'FasilitasController::delete/$1', ['filter' => 'auth:admin']);

$routes->post('admin/pembayaran/update_status', 'PembayaranController::updateStatus', ['filter' => 'auth:admin']);

$routes->get('/admin/pelanggan', 'PembayaranController::pelanggan', ['filter' => 'auth:admin']);

$routes->get('/admin/pemilik-kost', 'KostOwnerController::index');
$routes->get('/admin/pemilik-kost/create', 'KostOwnerController::create');
$routes->post('/admin/pemilik-kost/store', 'KostOwnerController::store');
$routes->get('/admin/pemilik-kost/edit/(:num)', 'KostOwnerController::edit/$1');
$routes->post('/admin/pemilik-kost/update/(:num)', 'KostOwnerController::update/$1');
$routes->get('/admin/pemilik-kost/delete/(:num)', 'KostOwnerController::delete/$1');

// soory lil yang ini gua kureng
$routes->get('/kost/detail/(:num)', 'KostController::detail/$1');
