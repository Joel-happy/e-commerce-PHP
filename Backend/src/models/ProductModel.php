<?php

namespace Backend\src\models;

class ProductModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all products
    public function getAllProducts()
    {
        try {
            $query = "SELECT * FROM product";

            $result = $this->pdo->select($query, []);

            // Check if a result has returned
            if ($result && count($result) > 0) {
                return $result;
            } else {
                // No products found
                return [];
            }
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg;
            error_log($errorLog, 3, "error.log");
            return false;
        }
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
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg;
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }
}
