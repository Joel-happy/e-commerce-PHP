<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
        if (isset($_GET['error']) && $_GET['error'] === 'invalid_email') {
            echo 'Invalid email address. Please try again.';
        }
    ?>

    <form action="authController/register" method="post" id="registerForm">
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" required> <br>

        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required> <br>

        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required> <br>

        <label for="confirmPassword">Confirm Password:</label> <br>
        <input type="password" id="confirmPassword" name="confirmPassword" require> <br>

        <input type="submit" value="Register">
    </form>

    <script src="src/js/registerRules.js"></script>
</body>
</html>
