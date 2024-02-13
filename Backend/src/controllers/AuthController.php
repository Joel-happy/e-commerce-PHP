<?php

namespace src\controllers;

use src\utility\Utility;

// Start or resume session
session_start();

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
            $formData = $this->extractRegisterFormData();
            if ($this->validateRegisterFormData($formData)) {
                $this->processRegistration($formData);
            }
        } else {
            Utility::redirectWithMessage("register", "error", "invalid_request_method");
        }
    }

    private function extractRegisterFormData()
    {
        return [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirmPassword' => $_POST['confirmPassword']
        ];
    }

    private function validateRegisterFormData($formData)
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

    //
    // Handle login
    //

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractLoginFormData();
            if (!$this->validateLoginFormData($formData)) {
                $this->processLogin($formData);
            }
        } else {
            Utility::redirectWithMessage("login", "error", "invalid_request_method");
        }
    }

    private function extractLoginFormData()
    {
        return [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
    }

    private function validateLoginFormData($formData) 
    {
        // Validate email
        if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
            Utility::redirectWithMessage("login", "error", "invalid_email");
            return false;
        }
    }

    private function processLogin($formData) {
        $email = $formData['email'];
        $password = $formData['password'];

        // Retrieve user data by email and password
        $userData = $this->userModel->getUserDataByEmailAndPassword($email, $password);

        // Check if user exists
        if (!$userData){
            Utility::redirectWithMessage("login", "error", "invalid_credentials");
            return false;
        }

        // Check if account's email is verified
        if ($userData['emailVerified'] == 0) {
            Utility::redirectWithMessage("login", "error", "email_not_verified");
            return false;
        }

        $this->initializeSession($userData);
        
        return true;
    }

    private function initializeSession($userData)
    {
        /*
         * Set session cookie lifetime to 30 minutes (1800 seconds)
         * Once this time period elapses without any activity from the user,
         * the session cookie expires and the session is considered inactive.
        */
        ini_set('session.cookie_lifetime', 1800);

        /*
         * Set the session garbage collection lifetime to 30 minutes (1800 seconds)
         * Even after the session expires, its data might still exist on the server.
         * The garbage collection job is to check if any of these files exist and remove them.
        */
        ini_set('session.gc_maxlifetime', 1800);

        // Set session variables
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['admin'] = $userData['admin'];

        // Redirect user to home page
        Utility::redirectWithMessage("home", "", "");
    }

    //
    // Handle logout
    //

    public function logout() {
        // Unset all session variables
        $_SESSION = [];

        // Destroy session
        session_destroy();

        // Redirect user to home page
        Utility::redirectWithMessage("home", "", "");
    }
}
