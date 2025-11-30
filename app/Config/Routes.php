<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/authenticate', 'Auth::authenticate');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Admin Routes
$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('mahasiswa', 'Admin\MahasiswaController::index');
    $routes->get('mahasiswa/create', 'Admin\MahasiswaController::create');
    $routes->post('mahasiswa/store', 'Admin\MahasiswaController::store');
    $routes->get('mahasiswa/edit/(:segment)', 'Admin\MahasiswaController::edit/$1');
    $routes->post('mahasiswa/update/(:segment)', 'Admin\MahasiswaController::update/$1');
    $routes->get('mahasiswa/delete/(:segment)', 'Admin\MahasiswaController::delete/$1');
    
    $routes->get('dosen', 'Admin\DosenController::index');
    $routes->get('dosen/create', 'Admin\DosenController::create');
    $routes->post('dosen/store', 'Admin\DosenController::store');
    $routes->get('dosen/edit/(:segment)', 'Admin\DosenController::edit/$1');
    $routes->post('dosen/update/(:segment)', 'Admin\DosenController::update/$1');
    $routes->get('dosen/delete/(:segment)', 'Admin\DosenController::delete/$1');
    
    $routes->get('ruangan', 'Admin\RuanganController::index');
    $routes->get('ruangan/create', 'Admin\RuanganController::create');
    $routes->post('ruangan/store', 'Admin\RuanganController::store');
    $routes->get('ruangan/edit/(:segment)', 'Admin\RuanganController::edit/$1');
    $routes->post('ruangan/update/(:segment)', 'Admin\RuanganController::update/$1');
    $routes->get('ruangan/delete/(:segment)', 'Admin\RuanganController::delete/$1');
    
    $routes->get('jadwal', 'Admin\JadwalController::index');
    $routes->get('jadwal/create', 'Admin\JadwalController::create');
    $routes->post('jadwal/store', 'Admin\JadwalController::store');
    $routes->get('jadwal/edit/(:segment)', 'Admin\JadwalController::edit/$1');
    $routes->post('jadwal/update/(:segment)', 'Admin\JadwalController::update/$1');
    $routes->get('jadwal/delete/(:segment)', 'Admin\JadwalController::delete/$1');
});

// Mahasiswa Routes
$routes->group('mahasiswa', ['filter' => 'auth:mahasiswa'], function($routes) {
    $routes->get('rencana-studi', 'Mahasiswa\RencanaStudiController::index');
    $routes->get('rencana-studi/create', 'Mahasiswa\RencanaStudiController::create');
    $routes->post('rencana-studi/store', 'Mahasiswa\RencanaStudiController::store');
    $routes->get('rencana-studi/delete/(:segment)', 'Mahasiswa\RencanaStudiController::delete/$1');
    
    $routes->get('hasil-studi', 'Mahasiswa\HasilStudiController::index');
});

// Dosen Routes
$routes->group('dosen', ['filter' => 'auth:dosen'], function($routes) {
    $routes->get('jadwal', 'Dosen\JadwalController::index');
    $routes->get('nilai/(:segment)', 'Dosen\NilaiController::index/$1');
    $routes->post('nilai/update', 'Dosen\NilaiController::update');
});
