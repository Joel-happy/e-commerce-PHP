<?php

namespace Backend\src\utility;

class Utility
{
    const PASSWORD_REGEX = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    // Redirect user to a specific location in the website with a message
    public static function redirectWithMessage($location, $status, $message, $useAmpersand = false)
    {
        // Check if the $location already contains a query string
        $separator = (strpos($location, '?') === false) ? '?' : ($useAmpersand ? '&' : '?');
    
        // Append the parameters to the $location
        $redirectUrl = "../$location" . $separator . "$status=$message";
    
        header("Location: $redirectUrl");
        exit();
    }

    // Randomly generated token for email verification
    public static function generateToken()
    {
        return bin2hex(random_bytes(32));
    }

    // Send verification email
    public static function sendVerificationEmail($to, $token, $update = false)
    {
        // Set up email content
        $subject = "Account activation";
        $message = $update ? "Click the link below to verify your new email address:\n\n" : "Thank you for registering. Click the link below to activate your account:\n\n";
        $message .= "http://localhost/e-commerce-PHP/";
        $message .= $update ? "userController/updateEmail?" : "authController/verifyEmail?";
        $message .= "token=" . urlencode($token);
        if ($update) {
            $message .= "&newEmail=" . urlencode($to);
        }

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

    // Validate username length, redirect to location if not validated
    public static function validateUsername($location, $username)
    {
        if (strlen($username) < 4)
            Utility::redirectWithMessage($location, "error", "invalid_username");
    }

    // validate email, redirect to location if not validated
    public static function validateEmail($location, $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            Utility::redirectWithMessage($location, "error", "invalid_email");
    }

    // Validate password, redirect to location if not validated
    public static function validatePassword($location, $password)
    {
        if (!preg_match(self::PASSWORD_REGEX, $password))
            Utility::redirectWithMessage($location, "error", "invalid_password");
    }

    // Validate string data type, redirect to location if not validated
    public static function validateStringDataType($location, $value)
    {
        if (!is_string($value))
            Utility::redirectWithMessage($location, "error", "value_not_string");
    }

    // Validate numeric data type, redirect to location if not validated
    public static function validateNumericDataType($location, $value)
    {
        if (!is_numeric($value))
            Utility::redirectWithMessage($location, "error", "value_not_numeric");
    }

    // slice verification with a slice all word
    public static function sliceVerification($slice,$word)
    {
        if (strlen($slice) > strlen($word))
         return false;
       $lowerword=strtolower($word);
       $lowerslice=strtolower($slice);
       $arrayword = str_split($word,strlen($slice)-1);
       $arrayslice = str_split($slice);
       if (in_array($arrayslice,$arrayword)) // j'utilise ou double tcheck pour etre sur le premier plus rapide le deuxieme un peu plus long
            return true;
        if (stristr($word, $slice) === TRUE)
         return true;
        return false;
    }
    // search

    // public static function Searchadmin($search,$flag)
    // {
    //     if ($flag == true)

    // }
}
