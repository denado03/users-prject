<?php
session_start();
require_once "functions/register.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(alreadyRegistered($email)){
    $_SESSION['registered'] = 'Этот эл. адрес уже занят другим пользователем.';
    redirectTo('/page_register.php');
} else {
    registerUser($email, $password);
    $_SESSION['success'] = 'Регистрация успешна!';
    redirectTo('page_login.php');
}







