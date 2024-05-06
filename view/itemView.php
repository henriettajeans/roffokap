<?php

class ItemView
{

    public function outputItems(array $items): void
    {
        $json = [
            'garment-count' => count($items),
            'result' => $items
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function displayItems(array $item): void
    {
        $json = [
            'garment-count' => count($item),
            'result' => $item
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}