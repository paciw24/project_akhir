<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Admin

    // Login
$route['prosesLogin'] = 'Admin/prosesLogin';
$route['login'] = 'Admin/keHalamanLogin';
$route['logout'] = 'admin/logout';

    // Dashboard
$route['admin/dasboard'] = 'admin/keHalamanDasboard';

    // Member
$route['admin/member'] = 'admin/keHalamanMember';
$route['admin/member/tambah'] = 'admin/tambahMember';
$route['admin/member/ubah/(:any)'] = 'admin/editMember/$1';
$route['admin/member/edit'] = 'admin/editMember';

    // User
$route['admin/user'] = 'admin/keHalamanAdmin';

    // Paket
$route['admin/paket'] = 'admin/keHalamanPaket';

    // transaksi
$route['admin/transaksi'] = 'admin/keHalamanTransaksi';
$route['admin/transaksi/detail/(:any)'] = 'admin/keHalamanDetailTransaksi/$1';
$route['admin/transaksi/updateStatus'] = 'admin/updateStatus';


// Halaman Member


//eror
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
