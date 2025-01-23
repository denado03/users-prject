<?php
session_start();
require_once '../functions/helpers.php';
require_once '../functions/adding_user.php';
require_once '../functions/register.php';
$id = $_GET['id'];

if(!isLoggedIn()){
    redirectTo('../users.php');
} else {
    deleteUser($id);
    redirectTo('../users.php');
}

