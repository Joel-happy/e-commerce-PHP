<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

class ProductController
{
    private $productModel;

    public function __construct($productModel)
    {
        $this->productModel = $productModel;
    }

    //
    // Read Product
    //

    public function getAllProducts() {
        $products = $this->productModel->getAllProducts();
        return $products;
    }

    //
    // Add Product
    //

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $formData = $this->extractProductFormData();
            if ($this->validateProductFormData($formData)) {
                $this->processAddProduct($formData);
            }
        } else {
            Utility::redirectWithMessage("addProduct", "error", "invalid_request_method");
        }
    }

    private function extractProductFormData()
    {
        return [
            'productName' => $_POST['productName'],
            'productDescription' => $_POST['productDescription'],
            'productCategory' => $_POST['productCategory'],
            'productPrice' => floatval($_POST['productPrice']),
        ];
    }

    private function validateProductFormData($formData)
    {
        $productName = $formData['productName'];
        $productDescription = $formData['productDescription'];
        $productCategory = $formData['productCategory'];
        $productPrice = $formData['productPrice'];

        // Validate characters
        $productName = filter_var($productName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $productDescription = filter_var($productDescription, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $productCategory = filter_var($productCategory, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate data types
        Utility::validateStringDataType("addProduct", $productName);
        Utility::validateStringDataType("addProduct", $productDescription);
        Utility::validateStringDataType("addProduct", $productCategory);
        Utility::validateNumericDataType("addProduct", $productPrice);

        return true;
    }

    private function processAddproduct($formData)
    {
        session_start();

        $productName = $formData['productName'];
        $productDescription = $formData['productDescription'];
        $productCategory = $formData['productCategory'];
        $productPrice = $formData['productPrice'];

        // Call the product model to create product
        $success = $this->productModel->createProduct($productName, $productDescription, $productCategory, $productPrice, $_SESSION['user_id']);

        if ($success) {
            Utility::redirectWithMessage("home", "", "");
        } else {
           Utility::redirectWithMessage("addProduct", "error", "product_not_added");
        }
    }
}
