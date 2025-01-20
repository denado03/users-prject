<?php 

function dbConnect(){
    $pdo = new PDO('mysql:host=localhost;dbname=diplom', 'root', '');
    return $pdo;
}

function redirectTo($path){
    header("Location: $path");
    exit;
}

function findUserByEmail($email){
    $pdo = dbConnect();
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "email" => $email,
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function alreadyRegistered($email){
    $result = findUserByEmail($email);
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

function userExists($email){
    $user = findUserByEmail($email);
    if(empty($user)){
        return false;
    }
    return true;
}

function userVerify($email, $password){
    $user = findUserByEmail($email);
    $hashed_password = $user['password'];
    if(password_verify($password, $hashed_password)){
        return true;
    }
    return false;
}

function createFlash($key, $message){
    $_SESSION[$key] = $message;
}

function showFlash($key){
    echo $_SESSION[$key];
}