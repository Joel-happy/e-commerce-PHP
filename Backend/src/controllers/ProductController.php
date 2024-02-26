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

    public function getAllProducts()
    {
        $products = $this->productModel->getAllProducts();
        return $products;
    }

    public function getProductById()
    {
        $productId = $_GET['productId'];
        $product = $this->productModel->getProductById($productId);
        return $product;
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

        // Handle product image
        if ($_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
            $formData['productImage'] = $_FILES['productImage'];
        } else {
            // Image upload failed
            $formData['productImage'] = null;
        }

        return $formData;
    }

    private function validateProductFormData($formData)
    {
        $productName = $formData['productName'];
        $productImage = $formData['productImage'];
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
        Utility::validateImage("addProduct", $productImage);

        return true;
    }

    private function processAddproduct($formData)
    {
        session_start();

        $productName = $formData['productName'];
        $productImage = $formData['productImage'];
        $productDescription = $formData['productDescription'];
        $productCategory = $formData['productCategory'];
        $productPrice = $formData['productPrice'];

        // Call the product model to create product
        $success = $this->productModel->createProduct($productName, $productImage['name'], $productDescription, $productCategory, $productPrice, $_SESSION['user_id']);

        if ($success) {
            $uploadDir = "Frontend/assets/userImg/";
            $targetFile = $uploadDir . basename($productImage['name']);
            if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
                // Image uploaded successfully
                Utility::redirectWithMessage("home", "", "");
            } else {
                 // Error in uploading image
                Utility::redirectWithMessage("addProduct", "error", "image_not_uploaded");
            }
        } else {
            Utility::redirectWithMessage("addProduct", "error", "product_not_added");
        }
    }

    //
    // Update Product
    //

    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $formData = $this->extractProductFormData();
            if ($this->validateProductFormData($formData)) {
                $this->processUpdateProduct($formData);
            }
        } else {
            Utility::redirectWithMessage("addProduct", "error", "invalid_request_method");
        }
    }

    private function processUpdateProduct($formData)
    {
        session_start();

        $productId = $formData['productId'];
        $productName = $formData['productName'];
        $productImage = $formData['productImage'];
        $productDescription = $formData['productDescription'];
        $productCategory = $formData['productCategory'];
        $productPrice = $formData['productPrice'];

        // Call the product model to update a product
        $success = $this->productModel->updateProduct($productId, $productName, $productImage['name'], $productDescription, $productCategory, $productPrice, $_SESSION['user_id']);

        if ($success) {
            $uploadDir = "Frontend/assets/userImg/";
            $targetFile = $uploadDir . basename($productImage['name']);
            if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
                // Image uploaded successfully
                Utility::redirectWithMessage("viewProduct?productId=$productId", "success", "product_updated", true);
            } else {
                // Error in uploading image
                Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "image_not_uploaded", true);
            }
        } else {
            Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "product_not_updated", true);
        }
    }

    //
    // Delete Product
    //

    public function deleteProduct()
    {
        session_start();

        $productId = $_GET['productId'];
        $success = $this->productModel->deleteProduct($productId, $_SESSION['user_id']);

        if ($success) {
            Utility::redirectWithMessage("home", "", "");
        } else {
            Utility::redirectWithMessage("viewProduct?productId=$productId", "error", "product_not_deleted");
        }
    }
}
