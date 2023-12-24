<?php

// namespace Config;

// $routes = Services::routes();
// if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
//     require SYSTEMPATH . 'Config/Routes.php';
// }

// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 service('auth')->routes($routes);

$routes->get('/', 'User::index');
$routes->get('user/dashboard', 'Admin::index'); 
$routes->get('admin', 'Admin::index'); 
$routes->get('admin/show/(:num)', 'Admin::show/$1'); 
$routes->delete('admin/delete/(:num)', 'Admin::delete/$1');
$routes->post('admin/update/', 'Admin::perbarui');

$routes->group('{locale}', static function($routes) {
    service('auth')->routes($routes);
});


// if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
//     require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
// }


?>









