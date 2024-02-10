<?php

namespace src\controllers;

class AuthController
{

    // Fields
    private $userModel;

    // Constants
    const PASSWORD_REGEX = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    //
    // Handle Registration
    //

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractFormData();
            if ($this->validateFormData($formData)) {
                $this->processRegistration($formData);
            }
        } else {
            $this->redirectWithMessage("register", "error", "invalid_request_method");
        }
    }

    private function extractFormData()
    {
        return [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirmPassword' => $_POST['confirmPassword']
        ];
    }

    private function validateFormData($formData)
    {
        $username = $formData['username'];
        $email = $formData['email'];
        $password = $formData['password'];
        $confirmPassword = $formData['confirmPassword'];

        // Validate username length
        if (strlen($username) < 4) {
            $this->redirectWithMessage("register", "error", "invalid_username");
            return false;
        }

        // Validate username characters
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirectWithMessage("register", "error", "invalid_email");
            return false;
        }

        // Validate password
        if (!preg_match(self::PASSWORD_REGEX, $password)) {
            $this->redirectWithMessage("register", "error", "invalid_password");
            return false;
        }

        // Matching passwords
        if ($password != $confirmPassword) {
            $this->redirectWithMessage("register", "error", "not_matching_passwords");
            return false;
        }

        return true;
    }

    private function processRegistration($formData)
    {
        // Hash password
        $formData['password'] = password_hash($formData['password'], PASSWORD_DEFAULT);

        // Call the user model to add the user to the database
        $rowCount = $this->userModel->createUser($formData['username'], $formData['password'], $formData['password']);

        // Check if user has been successfully added to the database
        if ($rowCount > 0) {
            $this->redirectWithMessage("login", "success", "account_created_successfully");
        } else {
            $this->redirectWithMessage("register", "error", "account_creation_error");
        }
    }

    //
    // Handle login
    //

    public function login()
    {
    }

    //
    // Helper Functions
    //

    private function redirectWithMessage($location, $status, $message)
    {
        header("Location: ../$location?$status=$message");
        exit();
    }
}
