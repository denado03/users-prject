<?php
session_start();
require 'functions/register.php';

$email = $_POST['email'];
$password = $_POST['password'];

$userId = findUserByEmail($email)['id'];

if(userExists($email)){
   if(userVerify($email, $password)){
        $_SESSION['id'] =  $userId;
        redirectTo('users.php');
    } else {
        createFlash('warning', 'Неверные email или пароль');
        redirectTo('page_login.php');
    }
} else {
    createFlash('warning', 'Пользователь не найден');
    redirectTo('page_login.php');
}
