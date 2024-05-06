<?php

class SellerController
{
    private $model = null;
    private $view = null;

    public function __construct($itemModel, $itemView)
    {
        $this->model = $itemModel;
        $this->view = $itemView;
    }

    public function getAll()
    {
        $all = $this->model->getAllSellers();
        $this->view->outputSeller($all);
    }

    public function getSellerById($id)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        switch ($requestMethod) {
            case 'GET':
                $one = $this->model->getSellerById($id);
                $this->view->displaySeller($one);
                break;
        }
    }
}