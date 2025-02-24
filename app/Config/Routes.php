<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/welcome', 'Welcome::index');
$routes->get('/offers', 'fe\Offers::index');
$routes->get('/offers/detail/(:segment)', 'fe\Offers::detail/$1');
$routes->get('offers/checkout/(:num)', 'fe\Offers::checkout/$1');
$routes->post('offers/confirm', 'fe\Offers::confirm');
$routes->get('/booking', 'fe\BookingController::index');
$routes->get('/booking/payment/(:num)', 'fe\BookingController::payment/$1');
$routes->post('/booking/paymentconfirm', 'fe\BookingController::confirmPayment');
$routes->get('/invoice/(:num)', 'fe\BookingController::invoice/$1');

$routes->get('/welcome/detail_service/(:num)', 'Welcome::detail_service/$1');
$routes->get('/home', 'Home::index');
$routes->addRedirect('/', 'welcome');

$routes->get('login', 'Auth::login');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('/profile', 'Profile::index');
$routes->get('/profile/add', 'Profile::add');
$routes->post('/profile/store', 'Profile::store');
$routes->get('/profile/edit/(:num)', 'Profile::edit/$1');
$routes->post('/profile/update/(:num)', 'Profile::update/$1');
$routes->post('/profile/delete/(:num)', 'Profile::delete/$1');

$routes->get('/hotels', 'Hotels::index');
$routes->get('/hotels/add', 'Hotels::add');
$routes->post('/hotels/store', 'Hotels::store');
$routes->get('/hotels/edit/(:num)', 'Hotels::edit/$1');
$routes->post('/hotels/update/(:num)', 'Hotels::update/$1');
$routes->post('/hotels/delete/(:num)', 'Hotels::delete/$1');

$routes->get('/rentcar', 'Rentcar::index');
$routes->get('/rentcar/add', 'Rentcar::add');
$routes->post('/rentcar/store', 'Rentcar::store');
$routes->get('/rentcar/edit/(:num)', 'Rentcar::edit/$1');
$routes->post('/rentcar/update/(:num)', 'Rentcar::update/$1');
$routes->post('/rentcar/delete/(:num)', 'Rentcar::delete/$1');

$routes->get('/rooms', 'Rooms::index');
$routes->get('/rooms/add', 'Rooms::add');
$routes->post('/rooms/store', 'Rooms::store');
$routes->get('/rooms/edit/(:num)', 'Rooms::edit/$1');
$routes->post('/rooms/update/(:num)', 'Rooms::update/$1');
$routes->post('/rooms/delete/(:num)', 'Rooms::delete/$1');