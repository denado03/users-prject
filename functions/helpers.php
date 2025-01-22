<?php

function dbConnect(){
    $pdo = new PDO('mysql:host=localhost;dbname=diplom', 'root', '');
    return $pdo;
}

function createFlash($key, $message){
    $_SESSION[$key] = $message;
}

function showFlash($key){
    echo $_SESSION[$key];
}

function redirectTo($path){
    header("Location: $path");
    exit;
}