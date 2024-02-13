<?php

namespace src\models;

class UserModel
{

    // Fields
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUser($username, $email, $password, $token)
    {
        $query = "INSERT INTO account(username, email, password, token) VALUES(:username, :email, :password, :token)";
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':token' => $token
        ];

        $rowCount = $this->pdo->execute($query, $params);
        return $rowCount;
    }

    public function isEmailAlreadyInUse($email)
    {
        $query = "SELECT COUNT(*) AS count FROM account WHERE email=:email";
        $params = [
            ':email' => $email,
        ];
 
        $result = $this->pdo->select($query, $params);

        // Extract count from the result
        $count = ($result && isset($result[0]['count'])) ? $result[0]['count'] : 0;

        return $count > 0;
    }

    public function getUserDataByEmailAndPassword($email, $password)
    {
        $query = "SELECT id, username, email, emailVerified, admin, password FROM account WHERE email=:email";
        $params = [
            ':email' => $email,
        ];
    
        $result = $this->pdo->select($query, $params);

        // Check if a row was returned
        if ($result && count($result) > 0) {
            $hashedPassword = $result[0]['password'];

            // Verify the hashed password
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
    }
}
