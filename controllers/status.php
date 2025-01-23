<?php
session_start();
require_once '../functions/helpers.php';
require_once '../functions/register.php';
require_once '../functions/adding_user.php';

$status_id = $_POST['status'];
$user_id = $_POST['user_id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    setStatus($status_id, $user_id);
    createFlash('success', 'Статус успешно изменен');
    redirectTo('../users.php');
} else {
    redirectTo('../users.php');
}