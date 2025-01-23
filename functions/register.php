<?php 
require_once 'helpers.php';
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

function getUserById($id){ 
    $pdo = dbConnect();
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "id" => $id
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getAllUsers(){
    $pdo = dbConnect();
    $sql = "SELECT * FROM users";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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

function login($email){
    $user = findUserByEmail($email);
    $userInfo = [
        'id' => $user['id'],
        'email' => $user['email'],
        'role' => $user['role']
    ];
    return $_SESSION['user'] = $userInfo;
}

function isLoggedIn(){
    if(isset($_SESSION['user'])){
        return true;
    } 
    return false;
}

function getAuthenticatedUser(){
    if(isLoggedIn()){
        return $_SESSION['user'];
    }
    return false;
}

function isAdmin($user){
    if($user['role'] === 'admin'){
        return true;
    }
    return false;

}

