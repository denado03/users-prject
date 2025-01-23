<?php
session_start();
require_once '../functions/register.php';
require_once '../functions/helpers.php';

$email = $_POST['email'];
$password = $_POST['password'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
if(userExists($email)){
   if(userVerify($email, $password)){
        login($email);
        redirectTo('../users.php');
    } else {
        createFlash('warning', 'Неверные email или пароль');
        redirectTo('../page_login.php');
    }
} else {
    createFlash('warning', 'Пользователь не найден');
    redirectTo('../page_login.php');
}
}