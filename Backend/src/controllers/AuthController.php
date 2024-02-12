<?php

namespace src\controllers;

use src\utility\Utility;

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
            Utility::redirectWithMessage("register", "error", "invalid_request_method");
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
            Utility::redirectWithMessage("register", "error", "invalid_username");
            return false;
        }

        // Validate username characters
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Utility::redirectWithMessage("register", "error", "invalid_email");
            return false;
        }

        if ($this->userModel->isEmailAlreadyInUse($email)) {
            Utility::redirectWithMessage("register", "error", "email_already_in_use");
            return false;
        }

        // Validate password
        if (!preg_match(self::PASSWORD_REGEX, $password)) {
            Utility::redirectWithMessage("register", "error", "invalid_password");
            return false;
        }

        // Matching passwords
        if ($password != $confirmPassword) {
            Utility::redirectWithMessage("register", "error", "not_matching_passwords");
            return false;
        }

        return true;
    }

    private function processRegistration($formData)
    {
        // Hash password
        $formData['password'] = password_hash($formData['password'], PASSWORD_DEFAULT);

        // Generate token
        $token = Utility::generateToken();

        // Call the user model to add the user to the database
        $rowCount = $this->userModel->createUser($formData['username'], $formData['email'], $formData['password'], $token);

        // Check if user has been successfully added to the database
        if ($rowCount > 0) {
            if (Utility::sendVerificationEmail($formData['email'], $token)) {
                Utility::redirectWithMessage("login", "success", "account_created_successfully");
            } else {
                Utility::redirectWithMessage("register", "error", "error_send_email");
            }
        } else {
            Utility::redirectWithMessage("register", "error", "account_creation_error");
        }
    }


    // Responsible for processing the verification of user email addresses
    public function verifyEmail() 
    {
        if (isset($_GET['token'])) {
            // Retrieve token from URL
            $token = $_GET['token'];
            $status = $this->userModel->updateUserEmailVerificationStatus($token);
        
            if ($status) {
                Utility::redirectWithMessage("login", "success", "account_verified");
            } else {
                Utility::redirectWithMessage("register", "error", "invalid_token");
            }
        } else {
            Utility::redirectWithMessage("register", "error", "invalid_token");
        }
    }

    //
    // Handle login
    //

    public function login()
    {
    }
}
