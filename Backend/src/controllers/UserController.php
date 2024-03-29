<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

class UserController
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    //
    // Update Username
    //

    public function updateUsername()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractNewUsernameFormData();
            if ($this->validateNewUsernameFormData($formData)) {
                $this->processUpdateUsername($formData);
            }
        } else {
            Utility::redirectWithMessage("profile", "error", "invalid_request_method");
        }
    }

    private function extractNewUsernameFormData()
    {
        return [
            'newUsername' => $_POST['newUsername'],
        ];
    }

    private function validateNewUsernameFormData($formData)
    {
        $newUsername = $formData['newUsername'];

        // Validate username length
        Utility::validateUsername("profile", $newUsername);

        // Validate username characters
        $newUsername = filter_var($newUsername, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Check if username is already in use
        if ($this->userModel->isUsernameAlreadyInUse($newUsername)) {
            Utility::redirectWithMessage("profile", "error", "username_already_in_use");
            return false;
        }

        return true;
    }

    private function processUpdateUsername($formData)
    {
        session_start();

        // Call the user model to update user's username
        $success = $this->userModel->updateUsername($formData['newUsername'], $_SESSION['user_id']);

        if ($success) {
            // Update user's username inside current session
            $_SESSION['username'] = $formData['newUsername'];

            Utility::redirectWithMessage("profile", "success", "username_updated");
        } else {
            Utility::redirectWithMessage("profile", "error", "username_not_updated");
        }
    }

    //
    // Update email
    // 

    public function sendEmailToUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractEmailFormData();
            if ($this->validateEmailFormData($formData)) {
                $this->processSendEmailToUpdate($formData);
            }
        } else {
            Utility::redirectWithMessage("profile", "error", "invalid_request_method");
        }
    }

    private function extractEmailFormData()
    {
        return [
            'newEmail' => $_POST['newEmail'],
        ];
    }

    private function validateEmailFormData($formData)
    {
        $newEmail = $formData['newEmail'];

        // Validate email
        Utility::validateEmail("profile", $newEmail);

        // Check if email is already in use
        if ($this->userModel->isEmailAlreadyInUse($newEmail)) {
            Utility::redirectWithMessage("profile", "error", "email_already_in_use");
            return false;
        }

        return true;
    }

    private function processSendEmailToUpdate($formData)
    {
        session_start();

        $token = Utility::generateToken();
        // Call the user model to update user's verification mail token
        $success = $this->userModel->updateEmailVerificationToken($token, $_SESSION['user_id']);

        // If token has been updated
        if ($success) {
            // Send verification email to verify new email address
            if (Utility::sendVerificationEmail($formData['newEmail'], $token, true)) {
                Utility::redirectWithMessage("profile", "success", "email_sent_for_update");
            } else {
                Utility::redirectWithMessage("profile", "error", "email_not_sent");
            }
        } else {
            Utility::redirectWithMessage("profile", "error", "email_not_sent");
        }
    }

    public function updateEmail()
    {
        session_start();

        if (isset($_GET['token']) && isset($_GET['newEmail'])) {
            $token = $_GET['token'];
            $newEmail = $_GET['newEmail'];
            $status = $this->userModel->updateEmail($newEmail, $token, $_SESSION['user_id']);

            if ($status) {
                // Update user's email inside current session
                $_SESSION['email'] = $newEmail;

                Utility::redirectWithMessage("profile", "success", "email_updated");
            } else {
                Utility::redirectWithMessage("profile", "error", "invalid_token");
            }
        } else {
            Utility::redirectWithMessage("profile", "error", "invalid_token");
        }
    }

    //
    // Update Password
    // 

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractNewPasswordFormData();
            if ($this->validateNewPasswordFormData($formData)) {
                $this->processUpdatePassword($formData);
            }
        } else {
            Utility::redirectWithMessage("profile", "error", "invalid_request_method");
        }
    }

    private function extractNewPasswordFormData()
    {
        return [
            'newPassword' => $_POST['newPassword'],
            'newPasswordConfirm' => $_POST['newPasswordConfirm'],
        ];
    }

    private function validateNewPasswordFormData($formData)
    {
        $newPassword = $formData['newPassword'];
        $newPasswordConfirm = $formData['newPasswordConfirm'];

        // Validate password
        Utility::validatePassword("profile", $newPassword);

        // Matching passwords
        if ($newPassword != $newPasswordConfirm) {
            Utility::redirectWithMessage("profile", "error", "not_matching_passwords");
            return false;
        }

        return true;
    }

    private function processUpdatePassword($formData)
    {
        session_start();

        // Hash password
        $hashedPassword = password_hash($formData['newPassword'], PASSWORD_DEFAULT);

        // Call the user model to update user's password
        $success = $this->userModel->updatePassword($hashedPassword, $_SESSION['user_id']);

        if ($success) {
            Utility::redirectWithMessage("profile", "success", "password_updated");
        } else {
            Utility::redirectWithMessage("profile", "error", "password_not_updated");
        }
    }

    //
    // Display Order History
    //

    public function getOrderHistoryData() {
        session_start();
        $userId = $_SESSION['user_id'];

        $orderHistoryData = $this->userModel->fetchOrderHistoryData($userId);
        return $orderHistoryData;
    }
}
