<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->add('/auth', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authfilter']);
$routes->group("/users", ["filter" => "authfilter"], function($routes){
    $routes->get('', 'UserController::index');
    $routes->add('addUser', 'UserController::create');
    $routes->add('editUser', 'UserController::edit');
    $routes->add('deleteUser', 'UserController::delete');
});
$routes->group("/employee", ["filter" => "authfilter"], function($routes){
    $routes->get('', 'EmployeeController::index');
    $routes->add('addEmployee', 'EmployeeController::create');
    $routes->add('editEmployee', 'EmployeeController::edit');
    $routes->add('deleteEmployee', 'EmployeeController::delete');
});
