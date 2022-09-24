<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Admin
$route['prosesLogin'] = 'Admin/prosesLogin';
$route['login'] = 'Admin/keHalamanLogin';
$route['admin/dasboard'] = 'admin/keHalamanDasboard';
$route['logout'] = 'admin/logout';
// Halaman Member


//eror
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
