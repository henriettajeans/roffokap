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
}