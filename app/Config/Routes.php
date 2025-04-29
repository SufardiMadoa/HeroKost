<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Route untuk Home
$routes->get('/', 'Home::index');
$routes->get('/rekomendasi', 'Home::recomendation');
$routes->get('/detailKost', 'Home::detailKost');

// Route untuk Login
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authLogin');

// Route untuk Sign Up
$routes->get('/signup', 'AuthController::register');
$routes->post('/signup', 'AuthController::saveRegister');

// Route untuk Logout
$routes->get('/logout', 'AuthController::logout');


