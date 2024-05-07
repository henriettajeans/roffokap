<?php

class SellerView
{
    public function outputSeller(array $sellers): void
    {
        $json = [
            'seller-count' => count($sellers),
            'result' => $sellers
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function displaySeller(array $seller): void
    {
        $json = [
            'seller-count' => count($seller),
            'result' => $seller
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function outputSellerSubmissions(array $seller): void
    {
        $json = [
            "message" => " List of seller's submissions",
            'seller-count' => count($seller),
            'result' => $seller
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function outputTotalRevenuePerSeller(array $seller): void
    {
        $json = [
            "message" => " The total revenue of the seller",
            'seller-count' => count($seller),
            'result' => $seller
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }
    public function outputSubmittedItemsPerSeller(array $seller): void
    {
        $json = [
            "message" => "Amount of items this seller is selling",
            'seller-count' => count($seller),
            'result' => $seller
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}
