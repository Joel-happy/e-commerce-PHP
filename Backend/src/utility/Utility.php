<?php

namespace Backend\src\utility;

class Utility {

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
}