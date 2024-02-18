<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

class UserController
{
    // Fields
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    //
    // Update username
    //

    public function updateUsername() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractUserProfileUsernameFormData();
            if ($this->validateUserProfileUsernameFormData($formData)) {
                $this->processUpdateUsername($formData);
            }
        } else {
            Utility::redirectWithMessage("userProfile", "error", "invalid_request_method");
        }
    }

    private function extractUserProfileUsernameFormData() {
        return [
            'newUsername' => $_POST['newUsername'],
        ];
    }

    private function validateUserProfileUsernameFormData($formData) {
        $newUsername = $formData['newUsername'];

        // Validate username length
        Utility::validateUsername("userProfile", $newUsername);

        // Validate username characters
        $newUsername = filter_var($newUsername, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Check if username is already in use
        if ($this->userModel->isUsernameAlreadyInUse($newUsername)) {
            Utility::redirectWithMessage("userProfile", "error", "username_already_in_use");
            return false;
        }

        return true;
    }

    private function processUpdateUsername($formData) {
        session_start();

        // Call the user model to update user's username
        $status = $this->userModel->updateUserUsername($formData['newUsername'], $_SESSION['user_id']);

        if ($status) {
            // Update user's username inside current session
            $_SESSION['username'] = $formData['newUsername'];
            
            Utility::redirectWithMessage("userProfile", "success", "username_updated");
        } else {
            Utility::redirectWithMessage("userProfile", "error", "username_not_updated");
        }
    }

    //
    // Update email
    // 

    public function sendEmailToUpdate() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractUserProfileEmailFormData();
            if ($this->validateUserProfileEmailFormData($formData)) {
                $this->processUpdateEmail($formData);
            }
        } else {
            Utility::redirectWithMessage("userProfile", "error", "invalid_request_method");
        }
    }

    private function extractUserProfileEmailFormData() {
        return [
            'newEmail' => $_POST['newEmail'],
        ];
    }

    private function validateUserProfileEmailFormData($formData) {
        $newEmail = $formData['newEmail'];

        // Validate email
        Utility::validateEmail("userProfile", $newEmail);

        // Check if email is already in use
        if ($this->userModel->isEmailAlreadyInUse($newEmail)) {
            Utility::redirectWithMessage("userProfile", "error", "email_already_in_use");
            return false;
        }

        return true;
    }

    private function processUpdateEmail($formData) 
    {
        session_start();

        $token = Utility::generateToken();
        $status = $this->userModel->updateToken($token, $_SESSION['user_id']);
        
        if ($status) {
            if (Utility::sendUpdateEmailVerification($formData['newEmail'], $token)) {
                Utility::redirectWithMessage("userProfile", "success", "email_sent_for_update");
            } else {
                Utility::redirectWithMessage("userProfile", "error", "email_not_sent");
            }
        } else {
            Utility::redirectWithMessage("userProfile", "error", "email_not_sent");
        }
    }
    
    public function updateEmail() {
        session_start();

        if (isset($_GET['token']) && isset($_GET['newEmail'])) {
            $token = $_GET['token'];
            $newEmail = $_GET['newEmail'];
            $status = $this->userModel->updateUserEmail($newEmail, $token, $_SESSION['user_id']);
        
            if ($status) {
                // Update user's email inside current session
                $_SESSION['email'] = $newEmail;

                Utility::redirectWithMessage("userProfile", "success", "email_updated");
            } else {
                Utility::redirectWithMessage("userProfile", "error", "invalid_token");
            }
        } else {
            Utility::redirectWithMessage("userProfile", "error", "invalid_token");
        }
    }

    //
    // Update password
    // 

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractUserProfilePasswordFormData();
            if ($this->validateUserProfilePasswordFormData($formData)) {
                $this->processUpdatePassword($formData);
            }
        } else {
            Utility::redirectWithMessage("userProfile", "error", "invalid_request_method");
        }
    }

    private function extractUserProfilePasswordFormData() {
        return [
            'newPassword' => $_POST['newPassword'],
            'newPasswordConfirm' => $_POST['newPasswordConfirm'],
        ];
    }

    private function validateUserProfilePasswordFormData($formData) {
        $newPassword = $formData['newPassword'];
        $newPasswordConfirm = $formData['newPasswordConfirm'];

        // Validate password
        Utility::validatePassword("userProfile", $newPassword);

        // Matching passwords
        if ($newPassword != $newPasswordConfirm) {
            Utility::redirectWithMessage("userProfile", "error", "not_matching_passwords");
            return false;
        }

        return true;
    }

    private function processUpdatePassword($formData) {
        session_start();

        // Hash password
        $formData['newPassword'] = password_hash($formData['newPassword'], PASSWORD_DEFAULT);

        // Call the user model to update user's username
        $status = $this->userModel->updatePassword($formData['newPassword'], $_SESSION['user_id']);

        if ($status) {            
            Utility::redirectWithMessage("userProfile", "success", "password_updated");
        } else {
            Utility::redirectWithMessage("userProfile", "error", "password_not_updated");
        }
    }
}
