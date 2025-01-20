<?php 

function dbConnect(){
    $pdo = new PDO('mysql:host=localhost;dbname=diplom', 'root', '');
    return $pdo;
}

function redirectTo($path){
    header("Location: $path");
    exit;
}

function alreadyRegistered($email){
    $pdo = dbConnect();
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email,
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return !empty($result);
}

function registerUser($email, $password){
    $pdo = dbConnect();
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);
}