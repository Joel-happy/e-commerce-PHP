<?php

use Backend\src\utility\Utility;

session_start();

if ($_SESSION['admin']==0) {
    Utility::redirectWithMessage("e-commerce-PHP/login", "", "");
}
