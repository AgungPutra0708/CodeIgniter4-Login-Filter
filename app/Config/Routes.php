<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->add('/auth', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/users', 'UserController::index');
$routes->add('/users/addUser', 'UserController::create');
$routes->add('/users/editUser', 'UserController::edit');
$routes->add('/users/deleteUser', 'UserController::delete');
$routes->get('/employee', 'EmployeeController::index');
$routes->add('/employee/addEmployee', 'EmployeeController::create');
$routes->add('/employee/editEmployee', 'EmployeeController::edit');
$routes->add('/employee/deleteEmployee', 'EmployeeController::delete');
