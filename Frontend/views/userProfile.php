<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php
        use Backend\src\utility\Utility;
    
        session_start();

        if (!isset($_SESSION['user_id'])) {
            Utility::redirectWithMessage("e-commerce-PHP/home","","");
        }
    ?>

    <div class="container">
        <h2>User Profile</h2>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" value="<?= $_SESSION['username'] ?>" readonly disabled>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" value="<?= $_SESSION['email'] ?>" readonly disabled>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" value="***********" readonly disabled>
        </div>
    </div>
</body>
</html>
