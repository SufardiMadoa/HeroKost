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

// Route untuk Login
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authLogin');

// Route untuk Sign Up
$routes->get('/signup', 'AuthController::register');

$routes->post('/signup', 'AuthController::saveRegister');
$routes->get('/signup/pemilik', 'AuthController::registerPemilik');

$routes->post('/signup/pemilik', 'AuthController::saveRegisterPemilik');
$routes->get('/admin', 'AdminController::dashboard');
// Route untuk Logout
$routes->get('/logout', 'AuthController::logout');

$routes->get('/admin/kost', 'KostController::index');
$routes->get('/admin/kost/new', 'KostController::new');
$routes->post('/admin/kost', 'KostController::create');
$routes->get('/admin/kost/edit/(:segment)', 'KostController::edit/$1');
$routes->put('/admin/kost/(:segment)', 'KostController::update/$1');
$routes->delete('/admin/kost/(:segment)', 'KostController::delete/$1');

$routes->get('/admin/fasilitas', 'FasilitasController::index');
$routes->get('/admin/fasilitas/create', 'FasilitasController::create');
$routes->post('/admin/fasilitas', 'FasilitasController::store');
$routes->get('/admin/fasilitas/edit/(:num)', 'FasilitasController::edit/$1');
$routes->post('/admin/fasilitas/update/(:num)', 'FasilitasController::update/$1');
$routes->get('/admin/fasilitas/delete/(:num)', 'FasilitasController::delete/$1');
