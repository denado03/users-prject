<?php
    session_start();
    require_once '../functions/helpers.php';
    require_once '../functions/register.php';
    require_once '../functions/adding_user.php';

    $username = $_POST['username'];
    $job_title = $_POST['job_title'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $image = $_FILES['image'];
    $vk = $_POST['vk'];
    $telegram = $_POST['telegram'];
    $instagram = $_POST['instagram'];
    

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
    
        
    

    
    


?>