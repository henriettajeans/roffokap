<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$pdo = require_once __DIR__ . '/db/connect.php';

//Item connections
require_once __DIR__ . '/model/itemModel.php';
require_once __DIR__ . '/controller/itemController.php';
require_once __DIR__ . '/view/itemView.php';


//Item MVC
$itemModel = new ItemModel($pdo);
$itemView = new ItemView();
$itemController = new ItemController($itemModel, $itemView);

// $url = $_GET['url'];
// $requestMethod = $_SERVER["REQUEST_METHOD"];

// if (strpos($url, 'items/') === 0) {
//     $id = substr($url, strlen('items/'));
//     $itemController->getItemById($id);
// }

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if (strpos($url, 'items/') === 0) {
        $id = substr($url, strlen('items/'));
        $itemController->getItemById($id);
    }
} else {
    // Handle the case when 'url' parameter is not provided
    echo "URL parameter is missing.";
}