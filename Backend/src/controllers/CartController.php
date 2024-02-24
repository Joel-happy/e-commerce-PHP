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

    //
    // Get products from cart
    //

    public function getProductsFromCart()
    {
        session_start();

        $products = $this->cartModel->getProductsFromCartFromUser($_SESSION['user_id']);
        return $products;
    }

    //
    // Add Product to Cart
    //

    public function addProductToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formData = $this->extractAddProductCartFormData();
            if ($this->validateAddProductToCartFormData($formData)) {
                $this->processAddProductCart($formData);
            }
        } else {
            $productId = isset($_POST['productId']) ? urlencode($_POST['productId']) : '';
            Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "invalid_request_method", true);
        }
    }

    private function extractAddProductCartFormData()
    {
        return [
            'productId' => $_POST['productId'],
            'quantity' => $_POST['quantity'],
            'totalPrice' => $_POST['totalPrice'],
        ];
    }

    private function validateAddProductToCartFormData($formData)
    {
        session_start();

        $productId = $formData['productId'];
        $userId = $_SESSION['user_id'];

        // Check if product has already been added to the cart
        if ($this->cartModel->isProductAlreadyInCart($userId, $productId)) {
            Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "product_already_added", true);
            return false;
        }

        return true;
    }

    private function processAddProductCart($formData)
    {
        session_start();

        $userId = $_SESSION['user_id'];
        $productId = $formData['productId'];
        $quantity = $formData['quantity'];
        $totalPrice = $formData['totalPrice'];

        // Call the cart model to add product to cart
        $success = $this->cartModel->addProductToCart($userId, $productId, $quantity, $totalPrice);

        if ($success) {
            Utility::redirectWithMessage("viewProduct?productId=$productId", "success", "product_added_to_cart", true);
        } else {
            Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "product_not_added_to_cart", true);
        }
    }

    // 
    // Remove product from cart
    //

    public function removeProductFromCart()
    {
        session_start();

        $productId = $_GET['productId'];
        $userId = $_SESSION['user_id'];

        // Call the cart model to add product to cart
        $success = $this->cartModel->removeProductFromCart($userId, $productId);

        if ($success) {
            Utility::redirectWithMessage("cart", "success", "product_removed_from_cart");
        } else {
            Utility::redirectWithMessage("cart", "error", "product_not_removed_from_cart");
        }
    }

    //
    // Checkout
    //

    public function checkout()
    {
        session_start();

        $userId = $_SESSION['user_id'];
        $currentDate = date('Y-m-d');

        // Call the cart model to record purchase history
        $success = $this->cartModel->recordPurchaseHistory($userId, $currentDate);

        if (!$success) {
            Utility::redirectWithMessage("cart", "error", "record_purchase_products_fail");
        }

        // Call the cart model to remove all products from cart
        $success = $this->cartModel->removeAllProductsFromCart($userId);

        if (!$success) {
            Utility::redirectWithMessage("cart", "error", "remove_products_cart_fail");
        }

        Utility::redirectWithMessage("home", "", "");
    }
}
