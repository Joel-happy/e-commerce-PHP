<?php

namespace Backend\src\models;

class CartModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all products from cart for a specific user
    public function getProductsFromCart($userId) {
        try {
            $query = "SELECT cart.*, product.*
                    FROM cart
                    INNER JOIN product ON cart.product_id=product.id
                    WHERE cart.user_id=:user_id";
            $params = [
                ':user_id' => $userId,
            ];

            $result = $this->pdo->select($query, $params);

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

    // Check if product has already been added to cart
    public function isProductAlreadyInCart($userId, $productId) {
        try {
            $query = "SELECT COUNT(*) AS count FROM cart WHERE user_id=:user_id AND product_id=:product_id";
            $params = [
                ':user_id' => $userId,
                ':product_id' => $productId,
            ];

            $result = $this->pdo->select($query, $params);

            $count = ($result && isset($result[0]['count'])) ? $result[0]['count'] : 0;
            return ($count > 0);
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }

    // Add product to cart
    public function addProductToCart($userId, $productId, $quantity, $totalPrice) {
        try {
            $query = "INSERT INTO cart(user_id, product_id, quantity, total_price) VALUES(:user_id, :product_id, :quantity, :total_price)";
            $params = [
                ':user_id' => $userId,
                ':product_id' => $productId,
                ':quantity' => $quantity,
                ':total_price' => $totalPrice,
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
