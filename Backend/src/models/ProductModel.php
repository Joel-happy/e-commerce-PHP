<?php

namespace Backend\src\models;

class ProductModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create a product
    public function createProduct($name, $description, $category, $price, $user_id)
    {
        try {
            $query = "INSERT INTO product(name, description, category, price, user_id) VALUES(:name, :description, :category, :price, :user_id)";
            $params = [
                ':name' => $name,
                ':description' => $description,
                ':category' => $category,
                ':price' => $price,
                ':user_id' => $user_id,
            ];
    
            $rowCount = $this->pdo->execute($query, $params);
            return ($rowCount > 0);
        } catch (\PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
}
