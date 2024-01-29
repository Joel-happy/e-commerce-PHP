<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="/e-commerce-PHP/registerHandler" method="post">
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" required> <br>

        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required> <br>

        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required> <br>

        <label for="passwordConfirmation">Password confirmation:</label> <br>
        <input type="password" id="passwordConfirmation" name="passwordConfirmation" require> <br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
