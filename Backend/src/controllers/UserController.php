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
        $rowCount = $this->userModel->updateUserUsername($formData['newUsername'], $_SESSION['user_id']);

        if ($rowCount > 0) {
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

    public function updateEmail() {
        // Extract new email
        $newEmail = $_POST["newEmail"];

        // Validate email
        Utility::validateEmail("userProfile", $newEmail);
    }

    public function updatePassword() {
        // Extract new password and new confirm password
        $newPassword = $_POST['newPassword'];
        $newPasswordConfirm = $_POST['newPasswordConfirm'];

        // Validate password
        Utility::validatePassword("userProfile", $newPassword);

        // Matching passwords
        if ($newPassword != $newPasswordConfirm) {
            Utility::redirectWithMessage("userProfile", "error", "not_matching_passwords");
            return false;
        }
    }
}
