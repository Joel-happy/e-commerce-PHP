<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
</head>

<body>
    <?php 
    include('Frontend/views/_queryMessageHandler.php'); 
    include('initProduct.php'); 
    ?>

    <!-- Product info -->
    <p>Product id : <?= $productId; ?></p>
    <p>Product name : <?= $productName; ?></p>

    <?php if (!empty($productImage)) : ?>
        <p>Product image:</p>
        <img src="Frontend/assets/userImg/<?= $productImage; ?>" alt="Product Image">
    <?php endif; ?>

    <p>Product description : <?= $productDescription; ?></p>
    <p>Product category: <?= $productCategory; ?></p>
    <p>Product price: <?= $productPrice; ?></p>
    <!-- End product info -->

    <?php
    include('addToCart.php');
    include('updateProduct.php');
    ?>

    <!-- Scripts -->
    <script src="Frontend/js/product.js"></script>

    <script> // Script doesn't work when is put inside a js file
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