<?php

namespace src\core;

class PDO
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO('sqlite:' . __DIR__ . '/../../db/db.sqlite');

            // Set the error handling mode to EXCEPTION, which will make PDO throw exceptions on errors
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
        }
    }

    public function select($query)
    {
        try {
            // Execute a SELECT query
            $result = $this->pdo->query($query);

            // Fetch the results as an associative array
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);

            return $data;
        } catch (\PDOException $e) {
            echo 'Query failed : ' . $e->getMessage();
            return false;
        }
    }

    public function execute($query, $params)
    {
        try {
            // Prepare query
            $stmt = $this->pdo->prepare($query);

            // Bind parameters
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            // Execute the prepared statement (e.g., INSERT, UPDATE, DELETE)
            $stmt->execute();

            // Return number of affected rows
            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo 'Query failed : ' . $e->getMessage();
            return false;
        }
    }

    public function close()
    {
        $this->pdo = null;
    }
}
