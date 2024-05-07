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

//Seller connections
require_once __DIR__ . '/model/sellerModel.php';
require_once __DIR__ . '/controller/sellerController.php';
require_once __DIR__ . '/view/sellerView.php';

//Seller MVC
$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();
$sellerController = new SellerController($sellerModel, $sellerView);


if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if (strpos($url, 'item/') === 0) {
        $id = substr($url, strlen('item/'));
        $itemController->getItemById($id);
    }

    if (strpos($url, 'seller/') === 0) {

        $id = substr($url, strlen('seller/'));
        $sellerController->getSellerById($id);
    }

    if (strpos($url, 'sellers-items/') === 0) {
        $id = substr($url, strlen('sellers-items/'));
        $sellerController->getSellersListOfItems($id);
    }

    if (strpos($url, 'sellers-total/') === 0) {
        $id = substr($url, strlen('sellers-total/'));
        $sellerController->totalSalesAmount($id);
    }

    if (strpos($url, 'submitted-items-amount/') === 0) {
        $id = substr($url, strlen('submitted-items-amount/'));
        $sellerController->quantitySubmittedItems($id);
    }
} else {
    // If url is not provided
    echo "URL parameter is missing.";
}


if (isset($requestMethod) && isset($url)) {
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
} else {
    echo "Request parameters are missing.";
}
