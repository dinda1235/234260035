<?php
// app/Config/Routes.php
$routes->get('/login', 'Auth::login'); // Mendefinisikan route untuk halaman login (GET)
$routes->post('/login', 'Auth::login'); // Mendefinisikan route untuk proses login (POST)
$routes->get('/register', 'Auth::register'); // Mendefinisikan route untuk halaman registrasi (GET)
$routes->post('/register', 'Auth::register'); // Mendefinisikan route untuk proses registrasi (POST)
$routes->get('/logout', 'Auth::logout'); // Mendefinisikan route untuk proses logout (GET)

$routes->get('/tugas', 'Tugas::index'); // Mendefinisikan route untuk halaman tugas (GET)
$routes->get('/tugas/tambah', 'Tugas::tambah'); // Mendefinisikan route untuk halaman tambah tugas (GET)
$routes->post('/tugas/tambah', 'Tugas::tambah'); // Mendefinisikan route untuk proses tambah tugas (POST)
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Mendefinisikan route untuk halaman edit tugas (GET) dengan parameter id
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Mendefinisikan route untuk proses edit tugas (POST) dengan parameter id
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // Mendefinisikan route untuk proses hapus tugas (GET) dengan parameter id

?>
