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

    if (strpos($url, 'item/') === 0) {
        $id = substr($url, strlen('item/'));
        $itemController->getItemById($id);
    }
} else {
    // If url is not provided
    echo "URL parameter is missing.";
}

if (strpos($url, 'sellers/') === 0) {

    $id = substr($url, strlen('sellers/'));
    $sellerController->getSellerById($id);
}
if ($requestMethod == "PUT") {
    $itemController->update($id);
} else {
    switch ($url) {
        case 'items':
            if ($requestMethod == "GET") {
                $itemController->getAll();
            } elseif ($requestMethod == "POST") {
                $itemController->add();
            } else {
                echo "Invalid Request Method for items.";
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