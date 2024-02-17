<?php

namespace Backend\src\controllers;

use Backend\src\utility\Utility;

// Start or resume session
session_start();

class UserController
{
    // Fields
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function updateUsername() {
        echo "update username";
    }

    public function updateEmail() {
        echo "update email";
    }

    public function updatePassword() {
        echo "update password";
    }
}
