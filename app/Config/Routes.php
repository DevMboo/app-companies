<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('api', static function ($routes) {
    $routes->post('login', 'Api\AuthController::login');

    $routes->group('clients', static function ($routes) {
        $routes->get('', 'Api\ClientsController::index', ['as' => 'clients']);
        $routes->get('show/(:num)', 'Api\ClientsController::show/$1', ['as' => 'clients.show']);
        $routes->post('save', 'Api\ClientsController::create', ['as' => 'clients.save']);
        $routes->put('update/(:num)', 'Api\ClientsController::update/$1', ['as' => 'clients.update']);
        $routes->delete('delete/(:num)', 'Api\ClientsController::delete/$1', ['as' => 'clients.delete']);
    });

    $routes->group('products', ['filter' => 'auth'], static function ($routes) {
        $routes->get('', 'Api\ProductsController::index', ['as' => 'products']);
        $routes->get('show/(:num)', 'Api\ProductsController::show/$1', ['as' => 'products.show']);
        $routes->post('save', 'Api\ProductsController::create', ['as' => 'products.save']);
        $routes->put('update/(:num)', 'Api\ProductsController::update/$1', ['as' => 'products.update']);
        $routes->delete('delete/(:num)', 'Api\ProductsController::delete/$1', ['as' => 'products.delete']);
    });

    $routes->group('orders', static function ($routes) {
        $routes->get('', 'Api\OrdersController::index', ['as' => 'orders']);
        $routes->get('show/(:num)', 'Api\OrdersController::show/$1', ['as' => 'orders.show']);
        $routes->post('save', 'Api\OrdersController::create', ['as' => 'orders.save']);
        $routes->put('update/(:num)', 'Api\OrdersController::update/$1', ['as' => 'orders.update']);
        $routes->delete('delete/(:num)', 'Api\OrdersController::delete/$1', ['as' => 'orders.delete']);
    });
});
