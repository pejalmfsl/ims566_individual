<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::index');
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::attempt');
$routes->get('logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], static function ($routes): void {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('members', 'MembersController::index');
    $routes->get('books', 'BooksController::index');
    $routes->get('reports', 'ReportsController::index');
    $routes->get('borrowing', 'BorrowingController::index');
    $routes->get('profile', 'ProfileController::index');
});
