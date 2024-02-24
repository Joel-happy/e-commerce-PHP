<?php

session_start();

// Check if session exists
if (isset($_SESSION['user_id'])) {
    // Session exists, display user information
    echo '<h4><a href="profile">Profile</a></h4>';
    echo '<h4><a href="addProduct">Add product</a></h4>';
    echo '<h4><a href="cart">Cart</a></h4>';
    echo '<h4><a href="authController/logout">Logout</a></h4>';
} else {
    // Session does not exist, display registration and login buttons
    echo '<h4><a href="register">Register</a></h4> <br>';
    echo '<h4><a href="login">Login</a></h4>';
}
?>

<h3>Product List</h3>
<ul>
    <?php if (empty($products)) : ?>
        <li>No products available</li>
    <?php else : ?>
        <?php foreach ($products as $product) : ?>
            <li><a href="viewProduct?productId=<?= $product['id']; ?>"><?php echo $product['name']; ?> - <?php echo $product['price']; ?></a></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>