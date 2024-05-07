<?php

class ItemView
{

    public function outputItems(array $items): void
    {
        $json = [
            'item-count' => count($items),
            'result' => $items
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function displayItem(array $item): void
    {
        $json = [
            'item-count' => count($item),
            'result' => $item
        ];

        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function createNewItem(array $item): void
    {
        $json = [
            'item-count' => count($item),
            'result' => $item,
            'message' => "added a new item successfully!"
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }

    public function outputUpdatedItem(array $item): void
    {
        $json = [
            'result' => $item,
            'message' => "updated successfully!"
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }
}