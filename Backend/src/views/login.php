<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include('_queryMessageHandler.php'); ?>

    <h2>Login</h2>
    <form action="authController/login" method="post">
        <label for="email">Email:</label> <br>
        <input type="email" id="email" name="email" required> <br>

        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required> <br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
