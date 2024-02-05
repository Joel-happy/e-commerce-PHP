<?php

namespace src\core;

class Router {
    private $routes = [];

    public function __construct() {
        $this->addRoute('', function() {
            include('src/views/homePage.php');
        });
        
        $this->addRoute('home', function() {
            include('src/views/homePage.php');
        });

        $this->addRoute('register', function() {
            include('src/views/register.php');
        });

        $this->addRoute('login', function() {
            include('src/views/login.php');
        });
        
        $this->addRoute('authController/register', function() {
            include('src/controllers/AuthController.php');
            $userModel = new \src\models\UserModel();
            $authController = new \src\controllers\AuthController($userModel);
            $authController->register();
        });

        $this->addRoute('authController/login', function() {
            include('src/controllers/AuthController.php');
            $userModel = new \src\models\UserModel();
            $authController = new \src\controllers\AuthController($userModel);
            $authController->login();
        });
    }
 
    public function addRoute($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function handleRequest($path) {
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

?>
