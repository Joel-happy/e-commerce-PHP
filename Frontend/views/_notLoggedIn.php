<?php

use Backend\src\utility\Utility;

session_write_close();
session_start();

if (!isset($_SESSION['user_id'])) {
    Utility::redirectWithMessage("e-commerce-PHP/login", "", "");
}
