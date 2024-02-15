<?php

/*
 * When using an autoloader, it is recommended to use namespaces
 * e.g., namespace src\core for the file src/core/Database.php
 * The Database.php file is located inside the folder src\core and so
 * the namespace src\core. When adding the namespace, it is important to
 * notice that some classes might not be available anymore. If you're
 * using classes like PDO, you must use them like this : \PDO
 * This tells PHP to view those classes globally and not inside
 * the namespace where they're used
*/

spl_autoload_register(function ($className) {
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        echo "File not found: $filePath<br>";
    }
});

?>