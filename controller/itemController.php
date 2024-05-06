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


    public function getItemById($id)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        switch ($requestMethod) {
            case 'GET':
                $one = $this->model->getItemById($id);
                $this->view->displayItem($one);
                break;
        }
    }

    public function add()
    {
        $json = file_get_contents("php://input");

        $data = json_decode($json, true);

        if (isset($data['sellerId'], $data['name'], $data['type'], $data['description'], $data['price'])) {

            $sellerId = filter_var($data['sellerId'], FILTER_SANITIZE_NUMBER_INT);

            $sellerId = filter_var($sellerId, FILTER_VALIDATE_INT);

            $name = filter_var($data['name'], FILTER_SANITIZE_SPECIAL_CHARS);

            $type = filter_var($data['type'], FILTER_SANITIZE_SPECIAL_CHARS);

            $description = filter_var($data['description'], FILTER_SANITIZE_SPECIAL_CHARS);

            $price = filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT);

            $price = filter_var($price, FILTER_VALIDATE_INT);

            $one = $this->model->add($sellerId, $name, $type, $description, $price);

            $this->view->createNewItem($one);
        } else {
            echo "Unable to add new item.";
        }
    }



    public function update($id)
    {
        $json = file_get_contents("php://input");

        $data = json_decode($json, true);

        if (isset($data['sellerId'], $data['name'], $data['type'], $data['description'], $data['price'], $data['sold_date'])) {

            $sellerId = filter_var($data['sellerId'], FILTER_SANITIZE_NUMBER_INT);

            $sellerId = filter_var($sellerId, FILTER_VALIDATE_INT);

            $name = filter_var($data['name'], FILTER_SANITIZE_SPECIAL_CHARS);

            $type = filter_var($data['type'], FILTER_SANITIZE_SPECIAL_CHARS);

            $description = filter_var($data['description'], FILTER_SANITIZE_SPECIAL_CHARS);

            $price = filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT);

            $price = filter_var($price, FILTER_VALIDATE_INT);


            $soldDate = filter_var($data['sold_date'], FILTER_SANITIZE_SPECIAL_CHARS);

            $one = $this->model->updateItem($sellerId, $name, $type, $description, $price, $soldDate, $id);

            $this->view->outputUpdatedItem($one);
        } else {
            echo "OBS: could not update.";
        }
    }
}