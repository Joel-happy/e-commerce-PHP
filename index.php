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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
