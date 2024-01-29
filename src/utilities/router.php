<?php

class Router {
    private $routes = [];

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

    public function defineRoutes() {
        $this->addRoute('', function() {
            include('templates/homePage.php');
        });
        
        # REGISTER
        $this->addRoute('register', function() {
            include('templates/register.php');
        });

        $this->addRoute('registerHandler', function() {
            include('src/authentication/registerHandler.php');
        });

        # LOGIN
        $this->addRoute('login', function() {
            include('templates/login.php');
        });
    }
}

$router = new Router();
$router->defineRoutes();

?>
