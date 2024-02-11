<?php
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case "invalid_email":
            echo 'Invalid email address. Please try again (e.g. example@gmail.com)';
            break;
        case "email_already_in_use":
            echo 'The provided email address is already in use';
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
            echo 'Passwords not matching';
            break;
        case "account_creation_error":
            echo 'We\'re sorry, but we encountered an error while processing your account creation request. Please try again later.';
            break;
        case "invalid_request_method":
            echo 'Invalid request method';
            break;
        default:
            echo 'An unknown error has occured. We are sorry.';
            break;
    }
}
