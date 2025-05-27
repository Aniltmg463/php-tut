<?php
require_once 'config/dbConn.php';
require_once 'controllers/itemController.php';
require_once 'controllers/categoryController.php';
require_once 'models/item.php';

$dbConnection = new dbConn();
$dbConn = $dbConnection->conn;
$item = new Item($dbConn);

$controller = new ItemController($dbConn, $item);
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'index':
        $controller->index();
        break;

    case 'update':
        $controller->update();
        break;

    case 'delete':
        $controller->delete();
        break;
    default:
          $itemController->index(); 
        break;
}
?>