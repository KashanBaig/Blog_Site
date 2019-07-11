<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Post Routes
$route['posts/index']  = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/postView/$1';
$route['posts']        = 'posts/index';

//Default Route
$route['default_controller'] = 'pages/view';

//Categories Route
$route['categories/create']       = 'categories/create';
$route['categories']              = 'categories/index';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

//Page routes
$route['(:any)']                = 'pages/view/$1';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
