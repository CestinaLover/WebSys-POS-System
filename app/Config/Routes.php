<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');

$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::new');
$routes->post('/customers/create', 'Customers::create');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('/customers/update/(:num)', 'Customers::update/$1');

$routes->get('/users', 'Users::index');
$routes->get('/users/new', 'Users::new');
$routes->post('/users/create', 'Users::create');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');
$routes->get('/customers', 'Customers::index', ['filter' => 'auth']);
$routes->get('/customers/new', 'Customers::new', ['filter' => 'auth']);
$routes->post('/customers/create', 'Customers::create', ['filter' => 'auth']);
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1', ['filter' => 'auth']);
$routes->post('/customers/update/(:num)', 'Customers::update/$1', ['filter' => 'auth']);

$routes->get('/users', 'Users::index', ['filter' => 'auth']);
$routes->get('/users/new', 'Users::new', ['filter' => 'auth']);
$routes->post('/users/create', 'Users::create', ['filter' => 'auth']);
$routes->get('/users/edit/(:num)', 'Users::edit/$1', ['filter' => 'auth']);
$routes->post('/users/update/(:num)', 'Users::update/$1', ['filter' => 'auth']);

$routes->get('/products', 'Products::index', ['filter' => 'auth']);
$routes->get('/products/new', 'Products::new', ['filter' => 'auth']);
$routes->post('/products/create', 'Products::create', ['filter' => 'auth']);
$routes->get('/products/edit/(:num)', 'Products::edit/$1', ['filter' => 'auth']);
$routes->post('/products/update/(:num)', 'Products::update/$1', ['filter' => 'auth']);
$routes->post('/products/delete/(:num)', 'Products::delete/$1', ['filter' => 'auth']);

$routes->get('/sales', 'Sales::index', ['filter' => 'auth']);
$routes->get('/sales/new', 'Sales::new', ['filter' => 'auth']);
$routes->post('/sales/create', 'Sales::create', ['filter' => 'auth']);
