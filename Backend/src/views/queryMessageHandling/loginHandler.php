<?php
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case "account_created_successfully":
            echo "Account created. An email has been sent to verify your account.";
            break;
        case "account_verified":
            echo "Your account has been verified. You can now login.";
            break;
        default:
            echo "An unknown error has occured. We are sorry";
            break;
    }
}
