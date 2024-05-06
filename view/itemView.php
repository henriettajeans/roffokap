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

    //   public function createNewGarment(array $garment): void
    //   {
    //     $json = [
    //       'garment-count' => count($garment),
    //       'result' => $garment,
    //       'message' => "added a new garment successfully!"
    //     ];
    //     header("Content-Type: application/json");
    //     echo json_encode($json);
    //   }

    //   public function outputUpdatedGarment(array $garment): void
    //   {
    //     $json = [
    //       'result' => $garment,
    //       'message' => "updated successfully!"
    //     ];
    //     header("Content-Type: application/json");
    //     echo json_encode($json);

    //   }



}