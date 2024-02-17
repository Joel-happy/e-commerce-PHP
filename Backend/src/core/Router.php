<?php

namespace Backend\src\core;

class Router
{
    private $routes = [];

    public function __construct()
    { 
        $this->addRoute('', function () {
            include('Frontend/views/home.php');
        });

        $this->addRoute('home', function () {
            include('Frontend/views/home.php');
        });

        $this->addRoute('register', function () {
            include('Frontend/views/register.php');
        });

        $this->addRoute('login', function () {
            include('Frontend/views/login.php');
        });

        $this->addRoute('userProfile', function () {
            include('Frontend/views/userProfile.php');
        });

        $this->addRoute('authController/register', function () {
            include('Backend/src/controllers/AuthController.php');

            $pdo = new \Backend\src\core\PDO();
            $userModel = new \Backend\src\models\UserModel($pdo);
            $authController = new \Backend\src\controllers\AuthController($userModel);

            $authController->register();
        });

        $this->addRoute('authController/verifyEmail', function () {
            $pdo = new \Backend\src\core\PDO();
            $userModel = new \Backend\src\models\UserModel($pdo);
            $authController = new \Backend\src\controllers\AuthController($userModel);

            $authController->verifyEmail();
        });

        $this->addRoute('authController/login', function () {
            include('Backend/src/controllers/AuthController.php');

            $pdo = new \Backend\src\core\PDO();
            $userModel = new \Backend\src\models\UserModel($pdo);
            $authController = new \Backend\src\controllers\AuthController($userModel);
            
            $authController->login();
        });

        $this->addRoute('authController/logout', function() {
            $pdo = new \Backend\src\core\PDO();
            $userModel = new \Backend\src\models\UserModel($pdo);
            $authController = new \Backend\src\controllers\AuthController($userModel);

            $authController->logout();
        });
    }

    public function addRoute($path, $handler)
    {
        $this->routes[$path] = $handler;
    }

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
