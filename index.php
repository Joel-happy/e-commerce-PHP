<?php

require_once 'autoloader.php';

// Define the base path
$basePath = '/e-commerce-PHP';

// Get the current path from the URL and sanitize it
$requestPath = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

// Remove the base path from the beginning of the request path and trim '/'
$requestPath = trim(str_replace($basePath, '', $requestPath), '/');

// Instantiate all needed classes
$router = new \Backend\src\core\Router();

// Execute corresponding function for that specific path
$router->handleRequest($requestPath);

?>
