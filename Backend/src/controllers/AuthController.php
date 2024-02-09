<?php

namespace src\controllers;

class AuthController {

    // Fields
    private $userModel;
    
    // Constants
    const PASSWORD_REGEX = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    //
    // Handle Registration
    //

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handleRegistration();
        }

        // If registration is successfull, redirect to login page
        header('Location: ../login');
        exit();
    }

    private function handleRegistration() {
        // Get form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Validate username length
        if (strlen($username) < 4) {
            $this->returnWithError("register", "invalid_username");
        }

        // Validate username characters
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            $this->returnWithError("register", "invalid_email");
        
        // Validate password
        if (!preg_match(self::PASSWORD_REGEX, $password))
            $this->returnWithError("register", "invalid_password");

        // Matching passwords
        if ($password != $confirmPassword) {
            $this->returnWithError("register", "not_matching_passwords");
        }

        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Call the user model to add the user to the database
        $rowCount = $this->userModel->createUser($username, $email, $password);
        
        echo $rowCount;
    }

    //
    // Handle Login
    //

    public function login() {

    }

    //
    // Helper Functions
    //

    private function returnWithError($location, $typeError) {
        header("Location: ../$location?error=$typeError");
        exit();
    }
}

?>