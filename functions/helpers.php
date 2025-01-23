<?php

function dbConnect(){
    static $pdo;
    if($pdo === null){
        $pdo = new PDO('mysql:host=localhost;dbname=diplom; charset=UTF8', 'root', '');
    }
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
} static $pdo = null;
