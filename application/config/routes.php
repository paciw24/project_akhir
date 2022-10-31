<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Admin
$route['prosesLogin'] = 'Admin/prosesLogin';
$route['login'] = 'Admin/keHalamanLogin';
$route['admin/dasboard'] = 'admin/keHalamanDasboard';
$route['admin/member'] = 'admin/keHalamanMember';
$route['admin/member/tambah'] = 'admin/tambahMember';
$route['admin/member/ubah/(:any)'] = 'admin/editMember/$1';
$route['admin/member/edit'] = 'admin/editMember';
$route['admin/user'] = 'admin/keHalamanAdmin';
$route['admin/transaksi'] = 'admin/keHalamanTransaksi';
$route['admin/transaksi/detail/(:any)'] = 'admin/keHalamanDetailTransaksi/$1';
$route['logout'] = 'admin/logout';
// Halaman Member


//eror
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
