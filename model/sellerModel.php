<?php
require_once __DIR__ . "/db.php";

class SellerModel extends Database
{
    protected $table = "seller";

    public function getAllSellers()
    {
        $query = "SELECT * FROM $this->table ORDER BY first_name  ASC, last_name DESC ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}