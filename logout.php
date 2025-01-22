<?php
require_once 'functions/register.php';
require_once 'functions/helpers.php';
session_start();

$currentUser = getAuthenticatedUser();

if(isLoggedIn()){
    unset($currentUser);
}

session_destroy();

redirectTo('page_login.php');
