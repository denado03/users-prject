<?php

require_once 'helpers.php';
require_once 'register.php';

function addUser($email, $password){
    $pdo = dbConnect();
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    return $pdo->lastInsertId();
}

function editUser($username, $job_title, $phone, $address, $user_id){
    $pdo = dbConnect();
    $sql = "UPDATE users SET username = :username, job_title = :job_title,
    phone = :phone, address = :address WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "username" => $username,
        "job_title" => $job_title,
        "phone" => $phone,
        "address" => $address,
        "id" => $user_id
    ]);

}

function setStatus($status_id, $user_id){
    $pdo = dbConnect();
    $sql = "UPDATE users 
            SET status_id = :status_id 
            WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "status_id" => $status_id,
        "id" => $user_id
    ]);
}

function setSocialNetwork($vk, $telegram, $instagram, $userId){
    $pdo = dbConnect();
    $sql = "UPDATE users 
            SET vk = :vk,
            telegram = :telegram,
            instagram = :instagram 
            WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "vk" => $vk,
        "telegram" => $telegram,
        "instagram" => $instagram,
        "id" => $userId
    ]);

}

function uploadImage($image, $userId){
    $fileName = uniqid(). '-' . basename($image['name']);
    $filePath = '../img/user-images/' . $fileName;
    move_uploaded_file($image['tmp_name'], $filePath);

    $pdo = dbConnect();
    $sql = "UPDATE users SET image = :image WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "image" => $filePath,
        "id" => $userId
    ]);
}

function passwordsEqual($password, $passwordConfirm){
    if($password === $passwordConfirm){
        return true;
    }
    return false;
}
function editSecurity($email, $password, $id){
    $pdo = dbConnect();

    $sql = "UPDATE users 
            SET email = :email,
            password = :password
            WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "id" => $id
    ]);
}

function deleteUser($id){
    $pdo = dbConnect();
    $sql = "DELETE FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "id" => $id
    ]);
}

function currentUserEmail($email, $id){
    $user = getUserById($id);
    if($user['email'] === $email){
        return true;
    }
    return false;
}


