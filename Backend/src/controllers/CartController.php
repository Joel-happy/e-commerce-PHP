<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

class CartController
{
    private $cartModel;

    public function __construct($cartModel)
    {
        $this->cartModel = $cartModel;
    }

    // Add product to cart
    public function addProductToCart() {
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];

        echo "product id : " . $productId;
        echo "quantity : " . $quantity;
        echo "total price : " . $totalPrice;
    }
}
