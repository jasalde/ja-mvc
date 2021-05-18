<?php
declare(strict_types=1);

// Enable errors
error_reporting(E_ALL);
ini_set('display_errors', '1');

use FastRoute\RouteCollector;

// Bootstrap will return the configuration
$container = require __DIR__ . '/app/bootstrap.php';

$dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $router) {
    // PEticion se va a resolver en la raiz de la applicacion y quien se va a encargar de procesar la peticion es App\Controllers\HomeControllers
    // Ademas decimos queel metodo que se va a encarar del controllador es el metodo index
    $router->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
    $router->addRoute('GET', '/profile', ['App\Controllers\HomeController', 'profile']);
    $router->addRoute('GET', '/user/{name}', ['App\Controllers\HomeController', 'user']);
});

// pasamos el metodo que estamos utilizano GET POST PUT.
// Generamos la ruta que estamos intentando acceder
$router = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($router[0])
{
    case \FastRoute\Dispatcher::NOT_FOUND:
        echo 'Ruta no encontrada';
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'Ruta no encontrada para este metodo';
        break;
    case \FastRoute\Dispatcher::FOUND:
        $controller = $router[1];
        $params = $router[2];
        $container->call($controller, $params);
        break;
}