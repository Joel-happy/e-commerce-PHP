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
            ':token' => $token,
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
    
        // Debugging: Output the query and parameters
        var_dump($query, $params);
    
        $result = $this->pdo->select($query, $params);
    
        // Debugging: Output the result of the query
        var_dump($result);
    
        // Extract count from the result
        $count = ($result && isset($result[0]['count'])) ? $result[0]['count'] : 0;
    
        // Debugging: Output the count
        var_dump($count);
    
        return $count > 0;
    }
}
