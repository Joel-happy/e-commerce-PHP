<?php 

namespace src\models;

class UserModel {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createUser($username, $email, $password) {
        $query = "INSERT INTO account(username, email, password, token) VALUES(:username, :email, :password, :token)";
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $token = $this->generateToken();

        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':token' => $token,
        ];

        $rowCount = $this->pdo->execute($query, $params);
        return $rowCount;
    }

    // Randomly generated token for email verification
    private function generateToken() {
        return bin2hex(random_bytes(32));
    }
}

?>