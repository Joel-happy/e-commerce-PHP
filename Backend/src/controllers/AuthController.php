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

        header('Location: ../home');
        die();
    }

    private function handleRegistration() {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../register?error=invalid_email');
            die();
        }
    }

    public function login() {

    }
}

?>