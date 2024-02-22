<?php
// Global error handling
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "invalid_request_method":
            echo 'Invalid request method';
            break;
        case "invalid_email":
            echo 'Invalid email address. Please try again (e.g. example@gmail.com)';
            break;
    }
}

// register.php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "email_already_in_use":
            echo 'The provided email address is already in use';
            break;
        case "username_already_in_use":
            echo 'The provided username is already in use';
            break;
        case "error_send_email":
            echo 'We could not send the verification email to the provided email address.';
            break;
        case "invalid_password":
            echo 'Invalid password. Your password must contain at least 8 characters, including a capital letter, a number, and a special character';
            break;
        case "invalid_username":
            echo 'Invalid username. Your username must be at least 5 characters long';
            break;
        case "not_matching_passwords":
            echo 'Passwords not matching.';
            break;
        case "invalid_token":
            echo 'Verification token is invalid.';
            break;
        case "account_creation_error":
            echo 'We\'re sorry, but we encountered an error while processing your account creation request. Please try again later.';
            break;
    }
}

// login.php 
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case "account_created_successfully":
            echo "Account created. An email has been sent to verify your account.";
            break;
        case "account_verified":
            echo "Your account has been verified. You can now login into your account.";
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "invalid_credentials":
            echo "Your email or password is incorrect. Please try again.";
            break;
        case "email_not_verified":
            echo "Your email has not been verified yet.";
            break;
    }
}

// userProfile.php 
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case "username_updated":
            echo "Your username has been updated.";
            break;
        case "password_updated":
            echo "Your password has been updated.";
            break;
        case "email_sent_for_update":
            echo "We have sent you an email to verify your new email address.";
            break;
        case "email_updated":
            echo "Your email has been updated.";
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "username_not_updated":
            echo "We have encountered an error. Your username has not been updated.";
            break;
        case "password_not_updated":
            echo "We have encountered an error. Your password has not been updated.";
            break;
        case "email_not_sent":
            echo "We are sorry. We were not able to send an email to your new email address.";
            break;
    }
}

// addProduct.php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "value_not_string":
            echo "The product's name, description and category must be a string";
            break;
        case "value_not_numeric":
            echo "The product's price must be composed of only numeric values";
            break;
        case "product_not_added":
            echo "We have encountered an error. Your product was not added.";
            break;
    }
}

// viewProduct.php
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case "product_updated":
            echo "Your product information has been updated";
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "product_not_deleted":
            echo "We have encountered an error. Your product was not deleted";
            break;
        case "product_not_updated":
            echo "We have encountered an error. Your product was not updated";
            break;
    }
}

