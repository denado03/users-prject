<?php
session_start();
require '../functions/helpers.php';
require '../functions/adding_user.php';

$username = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$job_title = $_POST['job_title'];
$user_id = $_POST['id'];

editUser($username, $job_title, $phone, $address, $user_id);

createFlash('success', 'Профиль успешно изменен');
redirectTo('../users.php');
