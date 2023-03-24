<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'siswa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['daftar'] = 'siswa/daftar_siswa';
$route['tambah'] = 'siswa/tambah';
$route['add_siswa'] = 'siswa/add_siswa'; 
$route['update_siswa'] = 'siswa/update_siswa'; 
$route['siswa/(:num)'] = 'siswa/edit/$1'; 
$route['delete/(:num)'] = 'siswa/delete/$1'; 
