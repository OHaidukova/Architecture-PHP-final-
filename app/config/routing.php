<?php

use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add(
    'index',
    new Route('/', ['_controller' => [MainController::class, 'indexAction']])
);

$routes->add(
    'product_list',
    new Route('/product/list', ['_controller' => [ProductController::class, 'listAction']])
);

$routes->add(
    'product_info',
    new Route('/product/info/{id}', ['_controller' => [ProductController::class, 'infoAction']])
);
$routes->add(
    'comments',
    new Route('/product/comments/{id}', ['_controller' => [ProductController::class, 'commentsAction']])
);

$routes->add(
    'order_info',
    new Route('/order/info', ['_controller' => [OrderController::class, 'infoAction']])
);
$routes->add(
    'order_checkout',
    new Route('/order/checkout', ['_controller' => [OrderController::class, 'checkoutAction']])
);

$routes->add(
    'user_authentication',
    new Route('/user/authentication', ['_controller' => [\Controller\UserController::class, 'authenticationAction']])
);
$routes->add(
    'logout',
    new Route('/user/logout', ['_controller' => [\Controller\UserController::class, 'logoutAction']])
);

$routes->add(
    'network',
    new Route('/network', ['_controller' => [\Controller\NetworkController::class, 'indexAction']])
);

return $routes;