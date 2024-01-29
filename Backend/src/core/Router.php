<?php

namespace src\core;

class Router {
    private $routes = [];

    public function __construct() {
        $this->addRoute('', function() {
            include('src/views/homePage.php');
        });
        
        $this->addRoute('register', function() {
            include('src/views/register.php');
        });

        $this->addRoute('login', function() {
            include('src/views/login.php');
        });
        
        $this->addRoute('authController', function() {
            include('src/controllers/authController.php');
        });
    }

    public function addRoute($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function handleRequest($path) {
        if (array_key_exists($path, $this->routes)) {
            $handler = $this->routes[$path];

            if (is_callable($handler)) {
                $handler();
            } else {
                echo "Invalid handler for route : $path";
            }
        } else {
            echo "404 Not Found";
        }
    }
}

?>
