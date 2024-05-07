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

    public function createSeller()
    {
        $json = file_get_contents("php://input");

        $data = json_decode($json, true);

        if (isset($data['first_name'], $data['last_name'], $data['email'], $data['phone'])) {

            $firstName = filter_var($data['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);

            $lastName = filter_var($data['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);

            $email = filter_var($data['email'], FILTER_SANITIZE_SPECIAL_CHARS);

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $phone = filter_var($data['phone'], FILTER_SANITIZE_SPECIAL_CHARS);


            $one = $this->model->addSeller($firstName, $lastName, $email, $phone);

            $this->view->createNewSeller($one);
        } else {
            echo "Unable to add a new seller.";
        }
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

    public function getSellersListOfItems($id)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        switch ($requestMethod) {
            case 'GET':
                $one = $this->model->getSellerSubmissions($id);

                $this->view->outputSellerSubmissions($one);
                break;
        }
    }

    public function totalSalesAmount($id)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        switch ($requestMethod) {
            case 'GET':
                $one = $this->model->getTotalRevenuePerSeller($id);

                $this->view->outputTotalRevenuePerSeller($one);
                break;
        }
    }


    public function quantitySubmittedItems($id)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        switch ($requestMethod) {
            case 'GET':
                $one = $this->model->getSubmittedItemsPerSeller($id);
                $this->view->outputSubmittedItemsPerSeller($one);
                break;
        }
    }
}