<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Logout'] = 'Admin_login/logout';
