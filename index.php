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

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if (strpos($url, 'items/') === 0) {
        $id = substr($url, strlen('items/'));
        $itemController->getItemById($id);
    }
} else {
    // If url is not provided
    echo "URL parameter is missing.";
}

if (strpos($url, 'sellers/') === 0) {

    $id = substr($url, strlen('sellers/'));
    $sellerController->getSellerById($id);
} else {
    switch ($url) {
        case 'garments':
            if ($requestMethod == "GET") {
                $garmentController->getAll();
            } elseif ($requestMethod == "POST") {
                $garmentController->add();
            } else {
                echo "Invalid Request Method for garments.";
            }
            break;
        case 'sellers':
            if ($requestMethod == "GET") {
                $sellerController->getAll();
            } elseif ($requestMethod == "POST") {
                $sellerController->createSeller();
            } else {
                echo "Invalid Request Method for sellers.";
            }
            break;
        default:
            include_once __DIR__ . '/index.php';
            break;
    }
}