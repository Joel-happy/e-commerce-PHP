<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <!-- Handle form input errors -->
    <?php
        if (isset($_GET['error'])) {
            switch($_GET['error']) {
                case "invalid_email":
                    echo 'Invalid email address. Please try again (e.g. example@gmail.com)';                    
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
                default:
                    echo 'unknown error';
                    break;
            }
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

    <!-- Comment this line to test server-side form validation -->
    <script src="src/js/registerRules.js"></script>
</body>
</html>
