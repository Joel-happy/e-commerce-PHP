<?php

namespace Backend\src\core;

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
            error_log('Connection failed : ' . $e->getMessage());
        }
    }

    public function select($query, $params)
    {
        try {
            // Prepare query
            $stmt = $this->pdo->prepare($query);

            // Bind parameters, if any
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            $stmt->execute();

            // Fetch the results as an associative array
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $data;
        } catch (\PDOException $e) {
            error_log('Query failed : ' . $e->getMessage());
            return false;
        }
    }

    public function execute($query, $params)
    {
        try {
            // Prepare query
            $stmt = $this->pdo->prepare($query);

            // Bind parameters, if any
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            // Execute the prepared statement (e.g., INSERT, UPDATE, DELETE)
            $stmt->execute();

            // Return number of affected rows
            return $stmt->rowCount();
        } catch (\PDOException $e) {
            error_log('Query failed : ' . $e->getMessage());
            return false;
        }
    }

    public function close()
    {
        $this->pdo = null;
    }
}
