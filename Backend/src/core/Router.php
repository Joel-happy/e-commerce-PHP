<?php

namespace Backend\src\core;

use Frontend\view\View;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->defineViewsRoutes();
        $this->defineAuthRoutes();
        $this->defineUserRoutes();
        $this->defineProductRoutes();
    }

    // Get PDO
    private function getPDO()
    {
        return new \Backend\src\core\PDO();
    }

    // Initialize AuthController
    private function initAuthController()
    {
        $pdo = $this->getPDO();
        $userModel = new \Backend\src\models\UserModel($pdo);
        return new \Backend\src\controllers\AuthController($userModel);
    }

    // Initialize UserController
    private function initUserController()
    {
        $pdo = $this->getPDO();
        $userModel = new \Backend\src\models\UserModel($pdo);
        return new \Backend\src\controllers\UserController($userModel);
    }

    // Initialize ProductController
    private function initProductController() {
        $pdo = $this->getPDO();
        $productModel = new \Backend\src\models\ProductModel($pdo);
        return new \Backend\src\controllers\ProductController($productModel);
    }
    

    // Define routes for normal views
    private function defineViewsRoutes()
    {
        $this->addRoute('', function () {
            $products = $this->initProductController()->getAllProducts();
            include('Frontend/views/home.php');
        });

        $this->addRoute('home', function () {
            $products = $this->initProductController()->getAllProducts();
            include('Frontend/views/home.php');
        });

        $this->addRoute('register', function () {
            include('Frontend/views/register.php');
        });

        $this->addRoute('login', function () {
            include('Frontend/views/login.php');
        });

        $this->addRoute('userProfile', function () {
            include('Frontend/views/!userProfile.php');
        });

        $this->addRoute('addProduct', function() {
            include('Frontend/views/products/addProduct.php');
        });
    }

    // Define routes for the AuthController
    private function defineAuthRoutes()
    {
        $this->addRoute('authController/register', function () {
            $this->initAuthController()->register();
        });

        $this->addRoute('authController/verifyEmail', function () {
            $this->initAuthController()->verifyEmail();
        });

        $this->addRoute('authController/login', function () {
            $this->initAuthController()->login();
        });

        $this->addRoute('authController/logout', function () {
            $this->initAuthController()->logout();
        });
    }

    // Define routes for the UserController
    private function defineUserRoutes()
    {
        $this->addRoute('userController/updateUsername', function () {
            $this->initUserController()->updateUsername();
        });

        $this->addRoute('userController/sendEmailToUpdate', function () {
            $this->initUserController()->sendEmailToUpdate();
        });

        $this->addRoute('userController/updatePassword', function () {
            $this->initUserController()->updatePassword();
        });

        $this->addRoute('userController/updateEmail', function () {
            $this->initUserController()->updateEmail();
        });
    }

    // Define routes for the ProductController
    private function defineProductRoutes() {
        $this->addRoute('productController/addProduct', function () {
            $this->initProductController()->addProduct();
        });
    }

    // Add routes to array
    public function addRoute($path, $handler)
    {
        $this->routes[$path] = $handler;
    }

    // Handle given request
    public function handleRequest($path)
    {
        // Extract query parameters from the path
        $parsedUrl = parse_url($path);
        $queryParameters = [];

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParameters);
        }

        // Handle path
        if (array_key_exists($parsedUrl['path'], $this->routes)) {
            $handler = $this->routes[$parsedUrl['path']];

            if (is_callable($handler)) {
                $handler($queryParameters);
            } else {
                echo "Invalid handler for route : $path";
            }
        } else {
            echo "404 Not Found";
        }
    }
}
