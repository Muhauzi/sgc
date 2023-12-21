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
// $routes->get('login', 'Api\AuthController::index');
$routes->get('user/dashboard', 'Admin::index'); // New route
$routes->get('admin', 'Admin::index'); // New route
$routes->get('admin/show/(:num)', 'Admin::show/$1'); // New route for 'get: admin/(:any)'
// $routes->post('login/auth', 'Api\AuthController::login'); // New login/auth route
$routes->delete('admin/delete/(:num)', 'Admin::delete/$1'); // New route for 'delete: admin/(:any)'
// $routes->get('logout', 'Api\AuthController::userLogout'); // New logout route
$routes->post('admin/update/', 'Admin::perbarui'); // New route for 'update: admin/(:any)'



// if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
//     require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
// }


?>









