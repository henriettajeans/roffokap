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

    public function getSellerById(int $id)
    {

        $query = "SELECT * FROM $this->table
      WHERE id = ?
      ORDER BY id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSeller(string $firstName, string $lastName, string $email, string $phone)
    {
        $query = "INSERT INTO $this->table (`first_name`, `last_name`, `email`,  `phone`) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$firstName, $lastName, $email, $phone]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListOfSellerSubmissionsOfItems(int $sellerId)
    {

        $sqlQuery = " SELECT i.name  'product_name' , i.type 'product_type', i.description 'product_description', i.price 'product_price', 
      i.sold_date 'product_sold_date' FROM $this->table  s  
      JOIN item i ON  s.id = i.sellerId WHERE s.id = ?";

        $stmt = $this->pdo->prepare($sqlQuery);
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalRevenuePerSeller(int $sellerId)
    {
        $sql_query = "SELECT s.first_name , s.last_name,  
      COUNT(i.sold_date)  AS ' sold items',  
      SUM(i.price)  'total sales amount' FROM $this->table  s
      JOIN item i  ON i.sellerId = s.id
      WHERE i.sold_date IS NOT NULL AND s.id = ? ";

        $stmt = $this->pdo->prepare($sql_query);
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubmittedItemsPerSeller(int $sellerId)
    {

        $sql_query = " SELECT s.first_name , s.last_name , 
      COUNT(s.id)  AS `submitted items` FROM $this->table  s
        JOIN item i ON i.sellerId = s.id
      WHERE s.id = ? ORDER BY s.id";
        $stmt = $this->pdo->prepare($sql_query);
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}