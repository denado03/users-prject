<?php
    session_start();
    require_once '../functions/helpers.php';
    require_once '../functions/register.php';
    require_once '../functions/adding_user.php';

    $username = $_POST['username'];
    $job_title = $_POST['job_title'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $status = $_POST['status'];
    $image = $_FILES['image'];
    $vk = $_POST['vk'];
    $telegram = $_POST['telegram'];
    $instagram = $_POST['instagram'];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($email) || empty($password)){
        createFlash('validate', 'Введите емейл и пароль!');
        redirectTo('../create_user.php'); 
    } else {

    if(alreadyRegistered($email)){
        createFlash('danger', 'Пользователь с таким Email уже существует');
        redirectTo('../create_user.php'); }
    else {
        $userId = addUser($email, $password);
        editUser($username, $job_title, $phone, $address, $userId);
        setStatus($status, $userId);
        setSocialNetwork($vk, $telegram, $instagram, $userId);

        if(isset($image)){
            uploadImage($image, $userId);
        }

        redirectTo('../users.php');
        
    }
    }
}
        
    

    
    


?>