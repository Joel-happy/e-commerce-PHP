<?php

class Router {
    private $routes = [];

    public function addRoute($path, $handler) {
        $this->routes[$path] = $handler;
    }

    public function handleRequest($path) {
        if (array_key_exists($path, $this->routes)) {
            $handler = $this->routes[$path];
            $handler();
        } else {
            echo "404 Not Found";
        }
    }

    public function defineRoutes() {
        $this->addRoute('', function() {
            include('templates/homePage.php');
        });

        $this->addRoute('register', function() {
            include('templates/register.php');
        });

        $this->addRoute('login', function() {
            include('templates/login.php');
        });
    }
}

$router = new Router();
$router->defineRoutes();

?>
