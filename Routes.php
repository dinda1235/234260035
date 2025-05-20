<?php
// app/Config/Routes.php
$routes->get('/login', 'Auth::login'); // Mendefinisikan route untuk halaman login (GET) yang memanggil method login dari Auth
$routes->post('/login', 'Auth::login'); // Mendefinisikan route untuk proses login (POST) yang memanggil method login dari Auth
$routes->get('/register', 'Auth::register'); // Mendefinisikan route untuk halaman registrasi (GET) yang memanggil method register dari Auth
$routes->post('/register', 'Auth::register'); // Mendefinisikan route untuk proses registrasi (POST) yang memanggil method register dari Auth
$routes->get('/logout', 'Auth::logout'); // Mendefinisikan route untuk proses logout (GET) yang memanggil method logout dari Auth

$routes->get('/tugas', 'Tugas::index'); // Mendefinisikan route untuk halaman tugas (GET) yang memanggil method index dari Tugas
$routes->get('/tugas/tambah', 'Tugas::tambah'); // Mendefinisikan route untuk halaman tambah tugas (GET) yang memanggil method tambah dari Tugas
$routes->post('/tugas/tambah', 'Tugas::tambah'); // Mendefinisikan route untuk proses tambah tugas (POST) yang memanggil method tambah dari Tugas
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Mendefinisikan route untuk halaman edit tugas (GET) dengan parameter id yang memanggil method edit dari Tugas
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Mendefinisikan route untuk proses edit tugas (POST) dengan parameter id yang memanggil method edit dari Tugas
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // Mendefinisikan route untuk proses hapus tugas (GET) dengan parameter id yang memanggil method hapus dari Tugas

?>
