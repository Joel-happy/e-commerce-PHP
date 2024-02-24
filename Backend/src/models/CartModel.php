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
    public function getProductsFromCartFromUser($userId)
    {
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
    public function isProductAlreadyInCart($userId, $productId)
    {
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
    public function addProductToCart($userId, $productId, $quantity, $totalPrice)
    {
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

    // Remove product from cart 
    public function removeProductFromCart($userId, $productId)
    {
        try {
            $query = "DELETE FROM cart WHERE product_id=:product_id AND user_id=:user_id";
            $params = [
                ':user_id' => $userId,
                ':product_id' => $productId,
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

    // Remove all products from cart
    public function removeAllProductsFromCart($userId)
    {
        try {
            $query = "DELETE FROM cart WHERE user_id=:user_id";
            $params = [
                ':user_id' => $userId,
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

    // Record purchased products
    public function recordPurchaseHistory($userId, $date)
    {
        try {
            $productIds = $this->getProductIdsFromCart($userId);

            foreach ($productIds as $productId) {
                $query = "INSERT INTO order_history (user_id, product_id, date) VALUES (:user_id, :product_id, :date)";
                $params = [
                    ':user_id' => $userId,
                    ':product_id' => $productId,
                    ':date' => $date,
                ];

                $rowCount = $this->pdo->execute($query, $params);

                if ($rowCount <= 0) {
                    return false;
                }
            }

            return true;
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }


    // Fetch product IDs associated with the user
    private function getProductIdsFromCart($userId)
    {
        try {
            $query = "SELECT product_id FROM cart WHERE user_id=:user_id ";
            $params = [
                ':user_id' => $userId,
            ];

            // Fetch products IDs
            $result = $this->pdo->select($query, $params);

            // Extract product IDs from the result set
            $productIds = array();
            foreach ($result as $row) {
                $productIds[] = $row['product_id'];
            }

            return $productIds;
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }
}
