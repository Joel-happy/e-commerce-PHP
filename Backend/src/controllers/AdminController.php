<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;


class AuthAdminController
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


    public function getProductById() {
        $productId = $_GET['productId'];
        $product = $this->productModel->getProductById($productId);
        return $product;
    }

    private function extractProductFormData()
    {
        $formData = [
            'productName' => $_POST['productName'],
            'productDescription' => $_POST['productDescription'],
            'productCategory' => $_POST['productCategory'],
            'productPrice' => floatval($_POST['productPrice']),
        ];
     
        // Check if productId exists in $_POST
        if (isset($_POST['productId'])) {
            $formData['productId'] = $_POST['productId'];
        }
    
        return $formData;
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

    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $formData = $this->extractProductFormData();
            if ($this->validateProductFormData($formData)) {
                $this->processUpdateProduct($formData);
            }
        } else {
            Utility::redirectWithMessage("addProduct", "error", "invalid_request_method");
        }
    }
}