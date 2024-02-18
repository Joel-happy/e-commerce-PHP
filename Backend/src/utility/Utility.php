<?php

namespace Backend\src\utility;

class Utility {

    // Constants
    const PASSWORD_REGEX = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    // Redirect user to a specific location in the website with a message
    public static function redirectWithMessage($location, $status, $message)
    {
        header("Location: ../$location?$status=$message");
        exit();
    }

    // Randomly generated token for email verification
    public static function generateToken()
    {
        return bin2hex(random_bytes(32));
    }

    // Send verification email
    public static function sendVerificationEmail($to, $token)
    {
        // Set up email content
        $subject = "Account activation";
        $message = "Thank you for registering. Click the link below to activate your account:\n\n";
        $message .= "http://localhost/e-commerce-PHP/authController/verifyEmail?token=" . urlencode($token);

        // Additional headers
        $headers = "From: dontReplyPlease@localhost\r\n";
        $headers .= "Reply-To: dontReplyPlease@localhost\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    
    // Send verification email
    public static function sendUpdateEmailVerification($to, $token)
    {
        // Set up email content
        $subject = "Account activation";
        $message = "Click the link below to activate verify your email address:\n\n";
        $message .= "http://localhost/e-commerce-PHP/userController/updateEmail?token=" . urlencode($token) . "&newEmail=" . urlencode($to);

        // Additional headers
        $headers = "From: dontReplyPlease@localhost\r\n";
        $headers .= "Reply-To: dontReplyPlease@localhost\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    // Validate form username length
    public static function validateUsername($location, $username) {
        if (strlen($username) < 4) Utility::redirectWithMessage($location, "error", "invalid_username");
    }

    // validate form email
    public static function validateEmail($location, $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Utility::redirectWithMessage($location, "error", "invalid_email");
        }
    }

    // Validate form password
    public static function validatePassword($location, $password) {
        if (!preg_match(self::PASSWORD_REGEX, $password)) {
            Utility::redirectWithMessage($location, "error", "invalid_password");
        }
    }
}