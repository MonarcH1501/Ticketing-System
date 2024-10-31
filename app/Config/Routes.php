<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//authentikasi login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/register', 'LoginController::register');
$routes->post('/register/store', 'LoginController::storeUser');


//ui page
$routes->get('/', 'HomeController::index'); // tampilkan home
$routes->get('/home', 'HomeController::index'); //tampilkan home
$routes->get('/settings','Settings::index'); //tampilkan dashboard


//pengelolaan ticket
$routes->get('/createticket','TicketController::createticket'); //tampilkan form pembuatan ticket
$routes->post('/saveticket','TicketController::saveticket'); //simpan pembuatan ticket
$routes->get('/dashboard','TicketController::index'); //menampilkan ticket yang sudah dibuat
$routes->get('/tickets/delete/(:num)', 'TicketController::delete/$1'); // route hapus ticket
$routes->get('/tickets/search', 'TicketsController::search');
$routes->get('/edit_ticket','TicketController::edit');

