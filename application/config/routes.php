<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Admin
$route['default_controller'] = 'admin/keHalamanLogin';
$route['proseslogin'] = 'admin/login';
$route['admin/dashboard'] = 'admin/keHalamanDasboard';
// Halaman Member


//eror
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
