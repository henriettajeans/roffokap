<?php
include_once __DIR__ . '/db.php';

class ItemModel extends Database
{
    protected $table = "item";

    public function getAllItems()
    {
        return $this->getAll($this->table);
    }

    public function getItemById($id)
    {
        $query = "SELECT * FROM $this->table  WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem(int $sellerId, string $name, string $type, string $description, int $price,)
    {
        $query = "INSERT INTO $this->table (`sellerId`, `name`, `type`,  `description`, `price` ) VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$sellerId, $name, $type, $description, $price]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateItem(int $sellerId, string $name, string $type, string $description, int $price, string $soldDate, int $itemId,)
    {
        $query = "UPDATE $this->table SET sellerId=?, name=?, type=?, description=?, price=?, sold_date = ?  WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$sellerId, $name, $type, $description, $price, $soldDate, $itemId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
