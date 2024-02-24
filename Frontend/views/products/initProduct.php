<?php
// Variables
$productId = $product['id'];
$productName = $product['name'];
$productImage = $product['image'];
$productDescription = $product['description'];
$productCategory = $product['category'];
$productPrice = $product['price'];
?>

<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Check if the connected user is the owner of the product
    if ($_SESSION['user_id'] == $product['user_id']) {
        // Encode the product as JSON and escape it for use in JavaScript
        $productJson = htmlspecialchars(json_encode($product));
        echo '<h4><a href="#" onclick="openUpdateModal(\'' . $productJson . '\')">Update</a></h4>';
        echo '<h4><a href="productController/deleteProduct?productId=' . $productId . '" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a></h4>';
    }
}
?>