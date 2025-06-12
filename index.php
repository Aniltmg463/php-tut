<?php
session_start();
require_once 'controllers/ItemController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/AuthController.php';

$publicRoutes = ['auth/login', 'auth/registration'];
// $publicRoutes = ['items/create', 'index'];

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//checks if the value of $action exists in the $publicRoutes array.
if (!in_array($action, $publicRoutes) && !isset($_SESSION['email'])) {
    header('Location: ./auth/login.php');
    exit;
}


$routes = [
    //auth
    'auth/login' => ['controller' => 'AuthController', 'method' => 'processLogin'],
    'auth/registration' => ['controller' => 'AuthController', 'method' => 'processRegistration'],
    'auth/logout' => ['controller' => 'AuthController', 'method' => 'processLogout'],

    //items
    'items/create' => ['controller' => 'ItemController', 'method' => 'create'],
    'index' => ['controller' => 'ItemController', 'method' => 'index'],
    'items/update' => ['controller' => 'ItemController', 'method' => 'update'],
    'items/delete' => ['controller' => 'ItemController', 'method' => 'delete'],

    //category
    'category/index' => ['controller' => 'CategoryController', 'method' => 'index'],
    'category/create' => ['controller' => 'CategoryController', 'method' => 'categoryCreate'],
    'category/update' => ['controller' => 'CategoryController', 'method' => 'categoryUpdate'],
    'category/delete' => ['controller' => 'CategoryController', 'method' => 'categoryDelete'],
];

// Check if the action exists in the routes
if (array_key_exists($action, $routes)) {
    $controllerName = $routes[$action]['controller'];
    $methodName = $routes[$action]['method'];

    $controller = new $controllerName();

    // Call the method if it exists
    if (method_exists($controller, $methodName)) {
        $controller->$methodName();
    } else {
        // Handle invalid method
        $controller = new ItemController();
        $controller->index();
    }
} else {
    // if action is not found
    $controller = new ItemController();
    $controller->index();
}
