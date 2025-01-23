<?php
session_start();
require_once '../functions/helpers.php';
require_once '../functions/register.php';
require_once '../functions/adding_user.php';

$image = $_FILES['image'];
$userId = $_POST['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($image['size'] == 0){
        createFlash('danger', 'Фото не было выбрано');
        redirectTo("../media.php?id=$userId");
    } else {
        uploadImage($image, $userId);
        createFlash('success', 'Фото успешно изменено');
        redirectTo('../users.php');
    }
} else {
    redirectTo('../users.php');
}


