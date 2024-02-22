<?php

namespace Backend\src\models;

class CartModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}
