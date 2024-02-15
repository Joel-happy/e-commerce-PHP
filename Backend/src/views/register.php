<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php include('_queryMessageHandler.php'); ?>

    <h2>Register</h2>
    <form action="authController/register" method="post" id="registerForm">
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" required> <br>

        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required> <br>

        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required> <br>

        <label for="confirmPassword">Confirm Password:</label> <br>
        <input type="password" id="confirmPassword" name="confirmPassword" required> <br>

        <input type="submit" value="Register">
    </form>

    <!-- Comment this line to test server-side form validation -->
    <script src="src/js/registerRules.js"></script>
</body>
</html>
