<?php
session_start();
require_once "../functions/register.php";
require_once '../functions/helpers.php';

$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

if(alreadyRegistered($email)){
    createFlash('registered', 'Этот эл. адрес уже занят другим пользователем.') ;
    redirectTo('../page_register.php');
} else {
    registerUser($email, $password);
    createFlash('success', 'Регистрация успешна');
    redirectTo('../page_login.php');
}
}






