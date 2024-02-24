<!-- Add to cart -->
<form method="post" action="cartController/addProductToCart">
    <input type="hidden" name="productId" value="<?php echo $productId; ?>">

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="1" min="1" oninput="calculateTotal(<?php echo $productPrice; ?>)">

    <p>Total Price: <span id="displayTotalPrice"><?php echo $productPrice; ?></span></p>
    <input type="hidden" value="<?php echo $productPrice; ?>" name="totalPrice" id="totalPrice">

    <button type="submit" name="add_to_cart">Add to Cart</button>
</form> <!-- End add to cart -->