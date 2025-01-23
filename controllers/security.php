<?php
session_start();
require_once '../functions/helpers.php';
require_once '../functions/register.php';
require_once '../functions/adding_user.php';

$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$id = $_POST['id'];

// Зарегестрирован ли данный email и email не пренадлежит пользователю, которого редактируем
if($_SERVER['REQUEST_METHOD'] === 'POST') {
if(alreadyRegistered($email) && !currentUserEmail($email, $id)){
    createFlash('danger', 'Этот эл. адрес уже занят другим пользователем.') ;
    redirectTo("../security.php?id=$id");
} else {
    if(passwordsEqual($password, $passwordConfirm)){
        editSecurity($email, $password, $id);
        createFlash('success', 'Профиль успешно изменен.') ;
        redirectTo('../users.php');
    } else{
        createFlash('danger', 'Пароли не совпадают.') ;
        redirectTo("../security.php?id=$id");
    }
}
} else {
    redirectTo('../users.php');
}
