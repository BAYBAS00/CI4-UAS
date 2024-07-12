<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user', 'User::index');
$routes->get('/user/tambah', 'User::tambah');
$routes->post('/user/save', 'User::save');
$routes->get('/user/ubah/(:num)', 'User::edit/$1');
$routes->post('/user/update/(:num)', 'User::update/$1');
$routes->get('/user/hapus/(:num)', 'User::hapus/$1');
$routes->get('/matkul', 'Matkul::index');
$routes->get('/matkul/tambah', 'Matkul::tambah');
$routes->post('/matkul/save', 'Matkul::save');
$routes->get('/matkul/ubah/(:num)', 'Matkul::edit/$1');
$routes->post('/matkul/update/(:num)', 'Matkul::update/$1');
$routes->get('/matkul/hapus/(:num)', 'Matkul::hapus/$1');
$routes->get('/kehadiran', 'Kehadiran::index');
$routes->get('/kehadiran/tambah', 'Kehadiran::tambah');
$routes->post('/kehadiran/save', 'Kehadiran::save');
$routes->get('/kehadiran/ubah/(:num)', 'Kehadiran::edit/$1');
$routes->post('/kehadiran/update/(:num)', 'Kehadiran::update/$1');
$routes->get('/kehadiran/hadir/(:num)', 'Kehadiran::hadir/$1');
$routes->get('/kehadiran/hapus/(:num)', 'Kehadiran::hapus/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/profil/ubah', 'Profil::edit');
$routes->post('/profil/update', 'Profil::update');
