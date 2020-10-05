<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "Register";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ============ Registration ============
$route['Signup'] = 'Register/index';
$route['Login'] = 'Register/Login';
// $route['Test'] = 'basicController/test';




// ============ Private Area ============
$route['Private_area'] = 'Private_area/index';


