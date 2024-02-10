<?php
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case "account_created_successfully":
            echo "Account created. An email has been sent to verify your account.";
            break;
        default:
            echo "An unknown error has occured. We are sorry";
            break;
    }
}
