<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            padding-top: 80px;
        }
    </style>
</head>


<body>
    <?php
    include('Frontend/views/_queryMessageHandler.php');
    include('initProduct.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5><?= $productName; ?></h5>
                            </div>
                            <div class="col-auto">
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    // Check if the connected user is the owner of the product
                                    if ($_SESSION['user_id'] == $product['user_id']) {
                                        // Encode the product as JSON and escape it for use in JavaScript
                                        $productJson = htmlspecialchars(json_encode($product));
                                        echo '<a href="#" onclick="openUpdateModal(\'' . $productJson . '\')" class="btn btn-sm btn-primary">Update</a>  ';
                                        echo '<a href="productController/deleteProduct?productId=' . $productId . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="btn btn-sm btn-danger">Delete</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($productImage)) : ?>
                        <div class="mb-3">
                            <img src="Frontend/assets/userImg/<?= $productImage; ?>" class="img-fluid" alt="Product Image">
                        </div>
                    <?php endif; ?>
                    <p class="card-text"><strong>Description:</strong> <?= $productDescription; ?></p>
                    <p class="card-text"><strong>Category:</strong> <?= $productCategory; ?></p>
                    <p class="card-text"><strong>Price:</strong> € <?= $productPrice; ?>.00</p>

                    <!-- Add to cart form -->
                    <form method="post" action="cartController/addProductToCart">
                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" oninput="calculateTotal(<?php echo $productPrice; ?>)" class="form-control">
                        </div>
                        <p>Total Price: <span id="displayTotalPrice"><?php echo $productPrice; ?></span> €</p>
                        <input type="hidden" value="<?php echo $productPrice; ?>" name="totalPrice" id="totalPrice">
                        <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                    </form>
                    <!-- End add to cart form -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    include('updateProduct.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        // Script doesn't work when put inside a js file for some reason
        // Calculate total amount based on product price and quantity chosen
        function calculateTotal(price) {
            var quantity = document.getElementById("quantity").value;
            var totalPrice = quantity * price;
            document.getElementById("displayTotalPrice").textContent = totalPrice.toFixed(2);
            document.getElementById("totalPrice").value = totalPrice.toFixed(2);
        }
    </script>
</body>

</html>