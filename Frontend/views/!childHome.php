<?php

session_start();

// Check if session exists
if (isset($_SESSION['user_id'])) {
    // Session exists, display user information
    echo '<h4><a href="userProfile">Profile</a></h4>';
    echo '<h4><a href="addProduct">Add product</a></h4>';
    echo '<h4><a href="authController/logout">Logout</a></h4>';
} else {
    // Session does not exist, display registration and login buttons
    echo '<h4><a href="register">Register</a></h4> <br>';
    echo '<h4><a href="login">Login</a></h4>';
}
