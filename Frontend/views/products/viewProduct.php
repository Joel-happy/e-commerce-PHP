<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?></title>
</head>
<body>

    <?php include('Frontend/views/_queryMessageHandler.php'); ?>

    <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            // Check if the connected user is the owner of the product
            if ($_SESSION['user_id'] == $product['user_id']) {
                // Encode the product as JSON and escape it for use in JavaScript
                $productJson = htmlspecialchars(json_encode($product));
                echo '<h4><a href="#" onclick="openUpdateModal(\'' . $productJson . '\')">Update</a></h4>';
                echo '<h4><a href="productController/deleteProduct?productId=' . $product['id'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a></h4>';
            }
        }
    ?>

    <!-- Product info -->
    <p>Product id : <?= $product['id']; ?></p>
    <p>Product name : <?= $product['name']; ?></p>
    <p>Product description : <?= $product['description']; ?></p>
    <p>Product category: <?= $product['category']; ?></p>
    <p>Product price: <?= $product['price']; ?></p>
    <!-- End product info -->

    <?php include('updateProduct.php'); ?>

    <!-- Add to cart -->
    <form method="post" action="cartController/addProductToCart">
        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" oninput="calculateTotal(<?php echo $product['price']; ?>)">
        
        <p>Total Price: <span id="displayTotalPrice"><?php echo $product['price']; ?></span></p>
        <input type="hidden" name="totalPrice" id="totalPrice">
        
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form> <!-- End add to cart -->

    <!-- Scripts -->
    <script src="Frontend/js/product.js"></script>
    
    <script>
        // Calculate total amount base on product price and quantity chosen
        function calculateTotal(price) {
            var quantity = document.getElementById("quantity").value;
            var totalPrice = quantity * price;
            document.getElementById("displayTotalPrice").textContent = totalPrice.toFixed(2);
            document.getElementById("totalPrice").value = totalPrice.toFixed(2);
        }
    </script>
</body>
</html>
