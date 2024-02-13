<?php

// Start session
session_start();

// Check if session exists
if (isset($_SESSION['user_id'])) {
    // Session exists, display user information
    echo "<h2>User ID: {$_SESSION['user_id']}</h2>";
    echo "<h2>Username: {$_SESSION['username']}</h2>";
    echo "<h2>Email: {$_SESSION['email']}</h2>";
    echo "<h2>Admin: {$_SESSION['admin']}</h2>";
    echo '<h2><a href="authController/logout">Logout</a></h2>';
} else {
    // Session does not exist, display registration and login buttons
    echo '<h2><a href="register">Register</a></h2> <br>';
    echo '<h2><a href="login">Login</a></h2>';
}
