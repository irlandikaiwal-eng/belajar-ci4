<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/profil-saya', 'Saya::index');

// Login & Logout (tidak perlu login untuk mengakses ini)
$routes->get('login', 'Auth::login');
$routes->post('login/proses', 'Auth::proses');
$routes->get('logout', 'Auth::logout');

// Halaman Mahasiswa (WAJIB login dulu, dijaga oleh AuthFilter)
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');
    $routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');
    $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
    $routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
    $routes->get('mahasiswa/hapus/(:num)', 'Mahasiswa::hapus/$1');
});
    $routes->get('scrum', 'Scrum::index'); 

