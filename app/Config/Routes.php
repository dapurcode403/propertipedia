<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('developer', 'DeveloperController::index');

$routes->get('api/unitbekas', 'Api\CApiUnitBekas::index');
$routes->post('api/unitbekas', 'Api\CApiUnitBekas::create');

$routes->get('/', 'Dashboard::index');
$routes->add('/login', 'Auth::login');
$routes->add('/logout', 'Auth::logout');
$routes->post('/authlogin', 'Auth::ceklogin');

$routes->group('dev', static function ($routes) {
    $routes->get('/', 'DeveloperController::index');
    $routes->post('data', 'DeveloperController::listData');
    $routes->get('add', 'DeveloperController::add');
    $routes->post('save', 'DeveloperController::save');
    $routes->get('del/(:segment)', 'DeveloperController::delete/$1');
    $routes->get('edit/(:segment)', 'DeveloperController::edit/$1');
    $routes->post('saveEdit', 'DeveloperController::save_edit');
});

$routes->group('prmh', static function ($routes) {
    $routes->get('/', 'PerumahanController::index');
    $routes->post('data', 'PerumahanController::listData');
    $routes->get('add', 'PerumahanController::add');
    $routes->post('save', 'PerumahanController::save');
    $routes->get('del/(:segment)', 'PerumahanController::delete/$1');
    $routes->get('edit/(:segment)', 'PerumahanController::edit/$1');
    $routes->post('saveEdit', 'PerumahanController::save_edit');
});

$routes->group('kons', static function ($routes) {
    $routes->get('/', 'KonsumenController::index');
    $routes->post('data', 'KonsumenController::listData');
    $routes->get('add', 'KonsumenController::add');
    $routes->post('save', 'KonsumenController::save');
    $routes->get('del/(:segment)', 'KonsumenController::delete/$1');
    $routes->get('edit/(:segment)', 'KonsumenController::edit/$1');
    $routes->post('saveEdit', 'KonsumenController::save_edit');
});

$routes->group('usr', static function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->post('data', 'UserController::listData');
    $routes->get('add', 'UserController::add');
    $routes->post('save', 'UserController::save');
    $routes->get('del/(:segment)', 'UserController::delete/$1');
    $routes->get('edit/(:segment)', 'UserController::edit/$1');
    $routes->post('saveEdit', 'UserController::save_edit');
    $routes->get('reset/(:segment)/(:segment)', 'UserController::reset/$1/$2');
});
