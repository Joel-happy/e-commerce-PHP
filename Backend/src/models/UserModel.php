<?php

namespace Backend\src\models;

class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create an account
    public function createAccount($username, $email, $password, $token)
    {
        try {
            $query = "INSERT INTO account(username, email, password, token) VALUES(:username, :email, :password, :token)";
            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $password,
                ':token' => $token
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

    // Check if given email is already used
    public function isEmailAlreadyInUse($email)
    {
        try {
            $query = "SELECT COUNT(*) AS count FROM account WHERE email=:email";
            $params = [
                ':email' => $email,
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

    // Check if given username is already used
    public function isUsernameAlreadyInUse($username)
    {
        try {
            $query = "SELECT COUNT(*) AS count FROM account WHERE username=:username";
            $params = [
                ':username' => $username,
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

    // Get existing user by email and password
    public function getUserByEmailAndPassword($email, $password)
    {
        try {
            $query = "SELECT id, username, email, emailVerified, admin, password FROM account WHERE email=:email";
            $params = [
                ':email' => $email,
            ];

            $result = $this->pdo->select($query, $params);

            // Check if a result was returned
            if ($result && count($result) > 0) {
                $hashedPassword = $result[0]['password'];

                // Verify if given password matches with stored hashed password
                if (password_verify($password, $hashedPassword)) {
                    // Passwords match, return user data
                    return [
                        'id' => $result[0]['id'],
                        'username' => $result[0]['username'],
                        'email' => $result[0]['email'],
                        'emailVerified' => $result[0]['emailVerified'],
                        'admin' => $result[0]['admin'],
                    ];
                } else {
                    // Passwords do not match
                    return null;
                }
            } else {
                // No user found
                return null;
            }
        } catch (\PDOException $e) {
            // Log the error with additional information
            $errorMsg = "Database error: " . $e->getMessage();
            $errorLog = "[" . date("Y-m-d H:i:s") . "] " . basename(__FILE__) . " (line " . __LINE__ . "): " . $errorMsg . "\n";
            error_log($errorLog, 3, "error.log");
            return false;
        }
    }

    // Verify the user email address
    public function updateEmailVerificationStatus($token)
    {
        try {
            $query = "UPDATE account SET emailVerified=1 WHERE token=:token";
            $params = [
                ':token' => $token,
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

    // Update the user's username
    public function updateUsername($username, $id)
    {
        try {
            $query = "UPDATE account SET username=:username WHERE id=:id";
            $params = [
                ':username' => $username,
                ':id' => $id,
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

    // Update the user's email
    public function updateEmail($email, $token, $id)
    {
        try {
            $query = "UPDATE account SET email=:email WHERE token=:token AND id=:id";
            $params = [
                ':email' => $email,
                ':token' => $token,
                ':id' => $id,
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

    // Update user's token for email verification
    public function updateEmailVerificationToken($token, $id)
    {
        try {
            $query = "UPDATE account SET token=:token WHERE id=:id";
            $params = [
                ':token' => $token,
                ':id' => $id,
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

    // Update user's password
    public function updatePassword($password, $id)
    {
        try {
            $query = "UPDATE account SET password=:password WHERE id=:id";
            $params = [
                ':password' => $password,
                ':id' => $id,
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

    // Fetch all data inside order history associated with a user
    public function fetchOrderHistoryData($userId) {
        try {
            $query = "SELECT order_history.*, product.*
                    FROM order_history
                    INNER JOIN product ON order_history.product_id=product.id
                    WHERE order_history.user_id=:user_id";
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
        // Get all User
        public function getAllUser()
        {
            try {
                $query = "SELECT * FROM account";
    
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
    
}
