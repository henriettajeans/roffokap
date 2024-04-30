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
        $statement = $this->pdo->prepare($query);
        $statement->execute([$id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}