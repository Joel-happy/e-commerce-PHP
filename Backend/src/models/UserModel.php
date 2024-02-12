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

    // Create an account to be used by an user
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

    // Check if given email is already used by a registered user
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

    // If possible, verify the user email address
    public function updateUserEmailVerificationStatus($token) {
        $query = "UPDATE account SET emailVerified = 1 WHERE token=:token";

        $params = [
            ':token' => $token,
        ];

        $rowCount = $this->pdo->execute($query, $params);
        return ($rowCount > 0); 
    }
}
