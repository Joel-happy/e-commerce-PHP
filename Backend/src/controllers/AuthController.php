<?php

namespace src\controllers;

class AuthController {

    private $userModel;
    
    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handleRegistration();
        }

        // If registration is successfull, redirect to login page
        header('Location: ../login');
        exit();
    }

    private function handleRegistration() {
        // Validate and sanitize data
        $username = $_POST['username'];
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Return to register form indicating the error message
            header('Location: ../register?error=invalid_email');
            exit();
        }

        $password = $_POST['password'];

        // Call the user model to add the user to the database
        $rowCount = $this->userModel->createUser($username, $email, $password);
        
        // (TEMP)
        echo $rowCount;
        // (TEMP)
    }

    public function login() {

    }
}

?>