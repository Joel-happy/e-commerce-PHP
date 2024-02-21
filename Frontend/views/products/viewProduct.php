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

    <p>Product id : <?= $product['id']; ?></p>
    <p>Product name : <?= $product['name']; ?></p>
    <p>Product description : <?= $product['description']; ?></p>
    <p>Product category: <?= $product['category']; ?></p>
    <p>Product price: <?= $product['price']; ?></p>
    <!--<p>Product user_id : <?= $product['user_id']; ?></p>-->

    <?php include('updateProduct.php'); ?>
</body>
</html>
