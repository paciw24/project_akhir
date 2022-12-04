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
$route['admin/member/edit'] = 'admin/ubahMember';
$route['admin/member/hapusMember/(:any)'] = 'admin/hapus_member/$1';

// User
$route['admin/user'] = 'admin/keHalamanAdmin';
$route['admin/user/tambah'] = 'admin/tambahAdmin';
$route['admin/user/ubah/(:any)'] = 'admin/editAdmin/$1';
$route['admin/user/edit'] = 'admin/ubahAdmin';
$route['admin/user/hapusUser/(:any)'] = 'admin/hapus_Admin/$1';

// Paket
$route['admin/paket'] = 'admin/keHalamanPaket';
$route['admin/paket/tambah'] = 'admin/tambahPaket';
$route['admin/paket/ubah/(:any)'] = 'admin/editPaket/$1';
$route['admin/paket/edit'] = 'admin/ubahPaket';
$route['admin/paket/hapusPaket/(:any)'] = 'admin/hapus_paket/$1';

// transaksi
$route['admin/transaksi'] = 'admin/keHalamanTransaksi';
$route['admin/transaksi/detail/(:any)'] = 'admin/keHalamanDetailTransaksi/$1';
$route['admin/transaksi/updateStatus'] = 'admin/updateStatus';
$route['admin/transaksi/bayar'] = 'admin/updateBayar';
$route['admin/verifikasi/setuju/(:any)'] = 'admin/verifikasiSetuju/$1';
$route['admin/verifikasi/tolak/(:any)'] = 'admin/verifikasiTolak/$1';

// Halaman Member
$route['member/login'] = 'member/keHalamanLogin';
$route['member/prosesLogin'] = 'member/prosesLogin';
$route['register'] = 'member/registrasi';


//eror
$route['default_controller'] = 'member';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
