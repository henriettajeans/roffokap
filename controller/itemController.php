<?php


class ItemController
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
        $all = $this->model->getAllItems();
        $this->view->outputItems($all);
    }


    // public function getGarmentById($id)
    // {
    //     $requestMethod = $_SERVER["REQUEST_METHOD"];

    //     switch ($requestMethod) {
    //         case 'GET':
    //             $one = $this->model->getGarmentById($id);
    //             $this->view->displayGarment($one);
    //             break;
    //     }
    // }






}