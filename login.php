<?php
session_start();
require 'functions/register.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(userExists($email)){
   if(userVerify($email, $password)){
        redirectTo('users.php');
    } else {
        createFlash('warning', 'Неверные email или пароль');
        redirectTo('page_login.php');
    }
} else {
    createFlash('warning', 'Пользователь не найден');
    redirectTo('page_login.php');
}
