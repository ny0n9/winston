<?php

use CodeIgniter\Router\RouteCollection;

$routes->set404Override(function () {
	$host = $_SERVER['HTTP_HOST'];
	$msg = substr($_SERVER['REQUEST_URI'], 1);
	return view('errors/view_error', [
		'title' => '404 Not Found',
		'message' => 'File path : ' . $host . '/' . $msg . ' yang diminta tidak ditemukan di server ini.'
	]);
});
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('beranda/about', 'Beranda::about');
$routes->get('beranda/chartjs2', 'Beranda::chartjs2');
$routes->get('beranda/chartjs3', 'Beranda::chartjs3');

$routes->post('beranda/test_ajax', 'Beranda::test_ajax');

$routes->get('pengguna', 'Pengguna::index');

$routes->post('pengguna/list_users', 'Pengguna::list_users');
$routes->post('pengguna/form_add_user', 'Pengguna::form_add_user');
$routes->post('pengguna/simpan_users', 'Pengguna::simpan_users');
$routes->post('pengguna/info_user', 'Pengguna::info_user');
$routes->post('pengguna/form_del_user', 'Pengguna::form_del_user');
$routes->post('pengguna/hapus_user', 'Pengguna::hapus_user');
$routes->post('pengguna/form_edit_user', 'Pengguna::form_edit_user');
$routes->post('pengguna/update_user', 'Pengguna::update_user');


$routes->get('error/(:any)', 'Error::show/$1');
