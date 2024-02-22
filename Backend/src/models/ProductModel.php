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

            // Check if a result has been returned
            if ($result && count($result) > 0) {
                return $result;
            } else {
                // No products found
                return [];
            }
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }

    // Get product by id
    public function getProductById($id)
    {
        try {
            $query = "SELECT * FROM product WHERE id=:id";
            $params = [
                ':id' => $id,
            ];

            $result = $this->pdo->select($query, $params);

            // Check if a result has been returned
            if ($result && count($result) > 0) {
                return [
                    'id' => $result[0]['id'],
                    'name' => $result[0]['name'],
                    'description' => $result[0]['description'],
                    'category' => $result[0]['category'],
                    'price' => $result[0]['price'],
                    'user_id' => $result[0]['user_id'],
                ];
            } else { 
                // No product found
                return [];
            }
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
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
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }

    // Update a product
    public function updateProduct($id, $name, $description, $category, $price, $user_id) {
        try {
            $query = "UPDATE product SET name=:name, description=:description, category=:category, price=:price WHERE id=:id AND user_id=:user_id";
            $params = [
                ':id' => $id,
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
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }

    // Delete a product
    public function deleteProduct($id, $user_id) {
        try {
            $query = "DELETE FROM product WHERE id=:id AND user_id=:user_id";
            $params = [
                ':id' => $id,
                ':user_id' => $user_id,
            ];

            $rowCount = $this->pdo->execute($query, $params);
            return ($rowCount > 0);
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }
}
