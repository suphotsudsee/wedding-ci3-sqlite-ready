<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';   // ← เปลี่ยนจาก welcome เป็น dashboard
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['donate/(:any)'] = 'donate/index/$1';
$route['dashboard']     = 'dashboard/index';
$route['info']          = 'dashboard/info';
$route['register'] = 'register/index';


// API
$route['api/register']['post']    = 'api/register';
$route['api/guest/(:any)']['get'] = 'api/guest/$1';
$route['api/donate']['post']      = 'api/donate';
$route['api/dashboard']['get']    = 'api/dashboard';
$route['api/info']['get']         = 'api/info';
