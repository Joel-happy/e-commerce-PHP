<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

use Backend\src\controllers\ProductController;
session_start();
$allProduct = ProductController::getAllProducts();
$allUser = ProductController::getAllUser();

class AdminController
{
    private $productModel;

    public function __construct($productModel,$userModel)
    {
        $this->productModel = $productModel;
        $this->userModel = $userModel;
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
        // slice verification with a slice all word
        public static function sliceVerification($slice,$word)
        {
            if (strlen($slice) > strlen($word))
             return false;
    
           $lowerword=strtolower($word);
           $lowerslice=strtolower($slice);
           $arrayword = str_split($word,strlen($slice)-1);
           $arrayslice = str_split($slice);
    
           if (in_array($arrayslice,$arrayword)){return true;} // j'utilise ou double tcheck pour etre sur le premier plus rapide le deuxieme un peu plus long
           if (stristr($word, $slice) === TRUE) {return true;}
           return false;
        }
        // search
    
        public static function searchadminP($search)
        {
            if (empty($_GET['search']) || empty($_GET['flag']== TRUE)){return "Error"}
                foreach ($allproduct as $product) {
                    if (sliceVerification($search,$product['name']))
                    $productTab = array_pop($product);
                }
                if (empty($productTab) == true) {return "Not Find";}
                if (empty($productTab)== false) {return $productTab;}
        }
    
    
        public static function searchadminU($search)
        {
            if(empty($_GET['search']|| empty($_GET['flag'] == FALSE))){return "Error"}
             foreach ($allUser as  $allUsers); {
                if (sliceVerification($search,$allUsers['name'])) {
                    $usertab = array_pop($allUsers);
                }
            }
            if (empty($usertab) == true){ return "Not find";}
            if (empty($usertab)== false){ return $usertab;}
        }
}